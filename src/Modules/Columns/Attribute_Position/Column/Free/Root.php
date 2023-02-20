<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Columns\Attribute_Position\Column\Free;

use ACA\WC\Settings;
use function JWWS\WP_Plugin_Framework\Functions\Debug\log_error;

class Root extends \AC\Column {
    /**
     *
     */
    private $error_message = 'Attribute not assigned';

    /**
     *
     */
    public function __construct() {
        $this
            ->set_type(type: 'column-attribute_position')  // Identifier, pick an unique name. Single word, no spaces. Underscores allowed.
            ->set_group(group: 'jwws-woocommerce')
            ->set_label(label: __(text: 'Attribute Position', domain: 'jwws')) // Default column label.
        ;
    }

    /**
     * Returns the display value for the column.
     *
     * @param mixed $product_id ID
     *
     * @return string Value
     */
    public function get_value(mixed $product_id): string {
        $value = $this->get_raw_value(product_id: $product_id);

        return $value === $this->error_message
            ? "<span style='color: #999'>{$value}</span>"
            : $value;
    }

    /**
     * Get the raw, underlying value for the column
     * Not suitable for direct display, use get_value() for that
     * This value will be used by 'inline-edit' and get_value().
     *
     * @param mixed $product_id ID
     *
     * @return mixed Value
     */
    public function get_raw_value(mixed $product_id): mixed {
        $attribute_key = $this->get_option(key: 'product_taxonomy_display');

        if (empty($attribute_key)) {
            return __(
                text: 'Attribute not selected in column settings.', 
                domain: 'jwws'
            );
        }

        $attributes = wc_get_product(the_product: $product_id)
            ->get_attributes()
        ;

        if (! array_key_exists(key: $attribute_key, array: $attributes)) {
            return __(text: $this->error_message, domain: 'jwws');
        }

        return $attributes[$attribute_key]->get_position();
    }

    /**
     * (Optional) Create extra settings for you column.
     * These are visible when editing a column.
     * You can remove this function is you do not use it!
     *
     * Write your own settings or use any of the standard available settings.
     */
    protected function register_settings(): void {
        $this->add_setting(
            setting: new Settings\Product\Attributes(column: $this),
        );
    }
}
