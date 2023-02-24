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
            if (is_plugin_active(plugin: 'woocommerce-products-wizard/woocommerce-products-wizard.php')) {
                Attach_Wizard\Root::hook();
            }
            Attribute_Position\Root::hook();
            Attribute_Visibility\Root::hook();
            Categories_Hierarchy\Root::hook();
            Display_Type\Root::hook();
        }
    }
}
