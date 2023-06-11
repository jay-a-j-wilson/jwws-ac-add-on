<?php

namespace JWWS\ACA\Modules\Products_Wizard\Columns\Attach_Wizard\Column\Free;

class Root extends \AC\Column {
    /**
     *
     */
    public function __construct() {
        $this
            // Identifier, pick an unique name. Single word, no spaces.
            // Underscores allowed.
            ->set_type(type: 'column-attach_wizard')
            ->set_group(group: 'jwws-products_wizard')
            // Default column label.
            ->set_label(label: __(text: 'Attach Wizard', domain: 'jwws')) 
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
        $value = $this->get_raw_value(product_id: $product_id);

        return empty($value)
            ? '-'
            : $value;
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
        $wizard_id = wc_get_product(the_product: $product_id)
            ->get_meta(key: '_wcpw_attach_wizard')
        ;

        return empty($wizard_id)
            ? null
            : get_the_title(post: $wizard_id);
    }
}
