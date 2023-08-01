<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules;

use JWWS\ACA\App\Modules\Products_Wizard\Products_Wizard;
use JWWS\ACA\App\Modules\WooCommerce\WooCommerce;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class Modules {
    /**
     * Factory method.
     */
    public static function new_instance(): self {
        return new self();
    }

    /**
     * @return void
     */
    private function __construct() {}

    public function hook(): void {
        if (is_plugin_active(plugin: 'woocommerce/woocommerce.php')) {
            WooCommerce::new_instance()->hook();

            if (is_plugin_active(plugin: 'woocommerce-products-wizard/woocommerce-products-wizard.php')) {
                Products_Wizard::new_instance()->hook();
            }
        }
    }
}
