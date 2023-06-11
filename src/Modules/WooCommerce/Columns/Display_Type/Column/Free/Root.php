<?php

namespace JWWS\ACA\Modules\WooCommerce\Columns\Display_Type\Column\Free;

class Root extends \AC\Column {
    /**
     *
     */
    public function __construct() {
        $this
            // Identifier, pick an unique name. Single word, no spaces.
            // Underscores allowed.
            ->set_type(type: 'column-display_type')  
            ->set_group(group: 'woocommerce')
            // Default column label.
            ->set_label(label: __(text: 'Display Type', domain: 'jwws')) 
        ;
    }

    /**
     * Returns the display value for the column.
     *
     * @param mixed $product_cat_id ID
     *
     * @return string Value
     */
    public function get_value(mixed $product_cat_id): string {
        $value = $this->get_raw_value(product_cat_id: $product_cat_id);

        return empty($value)
            ? '-'
            : ucfirst(string: $value);
    }

    /**
     * Get the raw, underlying value for the column
     * Not suitable for direct display, use get_value() for that
     * This value will be used by 'inline-edit' and get_value().
     *
     * @param mixed $product_cat_id ID
     *
     * @return mixed Value
     */
    public function get_raw_value(mixed $product_cat_id): mixed {
        return get_term_meta(
            term_id: $product_cat_id,
            key: 'display_type',
            single: true,
        );
    }
}
