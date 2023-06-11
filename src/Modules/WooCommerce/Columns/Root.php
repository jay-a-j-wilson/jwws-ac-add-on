<?php

namespace JWWS\ACA\Modules\WooCommerce\Columns;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Root.
 */
Class Root {
    /**
     * @return void
     */
    public static function hook(): void {
        Attribute_Position\Root::hook();
        Attribute_Visibility\Root::hook();
        Categories_Hierarchy\Root::hook();
        Display_Type\Root::hook();
    }
}
