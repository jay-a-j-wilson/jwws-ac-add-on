<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Columns;

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
        if (is_plugin_active(plugin: 'woocommerce/woocommerce.php')) {
            Categories_Hierarchy\Root::hook();
        }
    }
}
