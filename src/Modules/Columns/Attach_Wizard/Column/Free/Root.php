<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Columns\Attach_Wizard\Column\Free;

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
            ->set_type(type: 'column-attach_wizard')  // Identifier, pick an unique name. Single word, no spaces. Underscores allowed.
            ->set_group(group: 'jwws-woocommerce')
            ->set_label(label: __(text: 'Attach Wizard', domain: 'jwws')) // Default column label.
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
        $product    = wc_get_product(the_product: $product_id);
        $post       = get_post(post: $product->get_meta(key: '_wcpw_attach_wizard'));
        $post_title = get_the_title(post: $post);

        log_error($post);

        return $post_title;
    }
}