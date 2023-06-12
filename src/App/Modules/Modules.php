<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules;

use JWWS\ACA\{
    App\Modules\Products_Wizard\Products_Wizard,
    App\Modules\WooCommerce\WooCommerce,
};

if (! \defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class Modules {
    public static function hook(): void {
        if (is_plugin_active(plugin: 'woocommerce/woocommerce.php')) {
            WooCommerce::hook();

            if (is_plugin_active(plugin: 'woocommerce-products-wizard/woocommerce-products-wizard.php')) {
                Products_Wizard::hook();
            }
        }
    }
}
