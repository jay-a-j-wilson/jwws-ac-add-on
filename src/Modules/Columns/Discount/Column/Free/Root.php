<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Columns\Discount\Column\Free;

use JWWS\WP_Plugin_Framework\Template_Engine\Template;

class Root extends \AC\Column {
    /**
     * Identifier, pick an unique name.
     * Single word, no spaces. Underscores allowed.
     */
    private string $uid = 'column-products_wizard_discount';

    /**
     */
    public function __construct() {
        $this
            ->set_type(type: $this->uid)
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
        return $this->render(
            discounts: $this->get_raw_value(
                product_id: $product_id,
            ),
        );
    }

    /**
     * Renders output.
     *
     * @param mixed $discounts
     *
     * @return string
     */
    private function render(mixed $discounts): string {
        return empty($discounts)
            ? '-'
            : (new Template(filename: __DIR__ . '/templates/column'))
                ->assign(
                    names: 'discounts',
                    value: $this->format(discounts: $discounts),
                )
                ->output()
        ;
    }

    /**
     * @param array $discounts
     *
     * @return array
     */
    private function format(array $discounts): array {
        foreach ($discounts as $key => $value) {
            $discounts[$key]['id']    = $this->format_id(discount: $value);
            $discounts[$key]['value'] = $this->format_value(discount: $value);
            $discounts[$key]['type']  = $this->format_type(discount: $value);
        }

        return $discounts;
    }

    /**
     * @param mixed $discount
     *
     * @return string
     */
    private function format_id(mixed $discount): string {
        return empty($discount['id'])
            ? 'All'
            : get_the_title(post: $discount['id']);
    }

    /**
     * @param mixed $discount
     *
     * @return string
     */
    private function format_value(mixed $discount): string {
        switch ($discount['type']) {
            case 'percentage':
                return '-' . $discount['value'] . '%';

            case 'precise_price':
                return '$' . $discount['value'];

            case 'fixed':
                return '-$' . $discount['value'];

            default:
                return $discount['value'];
        }
    }

    /**
     * @param mixed $discount
     *
     * @return string
     */
    private function format_type(mixed $discount): string {
        return str_replace(
            search: '_',
            replace: ' ',
            subject: ucfirst(string: $discount['type']),
        );
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

        return $this->is_empty(discounts: $discounts)
            ? null
            : $discounts;
    }

    /**
     * Checks if discounts meta field has empty value.
     * Required as discounts that have been edited have empty values in the
     * database.
     *
     * @param mixed $discounts
     *
     * @return bool
     */
    private function is_empty(mixed $discounts): bool {
        return is_array(value: $discounts)
        && sizeof(value: $discounts) === 1
        && empty($discounts[0]['value'])
        && $discounts[0]['type'] === 'percentage';
    }

    /**
     * Enqueues CSS on the admin listings screen.
     */
    public function scripts(): void {
        wp_enqueue_style(
            handle: $this->uid,
            src: plugin_dir_url(file: __FILE__) . '/assets/css/styles.css',
        );
    }
}
