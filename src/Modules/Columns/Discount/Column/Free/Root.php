<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Columns\Discount\Column\Free;

use function JWWS\WP_Plugin_Framework\Functions\Debug\console_log;

class Root extends \AC\Column {
    /**
     *
     */
    public function __construct() {
        $this
            ->set_type(type: 'column-products_wizard_discount')  // Identifier, pick an unique name. Single word, no spaces. Underscores allowed.
            ->set_group(group: 'jwws-products_wizard')
            ->set_label(label: __(text: 'Discount', domain: 'jwws')) // Default column label.
        ;
    }

    /**
     * Returns the display value for the column.
     *
     * @param mixed $product_id
     *
     * @return string
     */
    public function get_value(mixed $product_id): string {
        $discounts = $this->get_raw_value(product_id: $product_id);

        if (empty($discounts)) {
            return '-';
        }

        $output = implode(separator: '<br>', array: $discounts);

        return $output;
    }

    /**
     * Get the raw, underlying value for the column
     * Not suitable for direct display, use get_value() for that
     * This value will be used by 'inline-edit' and get_value().
     *
     * @param mixed $product_id
     *
     * @return mixed
     */
    public function get_raw_value(mixed $product_id): mixed {
        $discounts = wc_get_product(the_product: $product_id)
            ->get_meta(key: '_wcpw_discount')
        ;

        if (empty($discounts)) {
            return null;
        }

        foreach ($discounts as $key => $discount) {
            $discounts[$key]['id'] = empty($discounts[$key]['id'])
                ? 'All'
                : get_the_title(post: $discount['id']);

            $discounts[$key]['id'] = '<strong>' . $discounts[$key]['id'] . ':</strong>';

            $discounts[$key]['value'] = $discounts[$key]['type'] === 'percentage'
                ? $discounts[$key]['value'] . '%'
                : '$' . $discounts[$key]['value'];

            $discounts[$key]['type'] = str_replace(
                search: '_',
                replace: ' ',
                subject: ucfirst(string: $discounts[$key]['type']),
            );

            $discounts[$key] = implode(separator: ' ', array: $discounts[$key]);
        }

        return $discounts;
    }
}
