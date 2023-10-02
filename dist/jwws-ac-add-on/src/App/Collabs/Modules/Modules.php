<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules;

use JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Products_Wizard;
use JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\WooCommerce;
use JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\YITH_Cost_Of_Goods;
use JWWS\ACA\App\Common\Enums\Plugin_Basename;

use function is_plugin_active;

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
        if (is_plugin_active(plugin: Plugin_Basename::WOOCOMMERCE->value)) {
            WooCommerce::new_instance()->hook();

            if (is_plugin_active(plugin: Plugin_Basename::PRODUCTS_WIZARD->value)) {
                Products_Wizard::new_instance()->hook();
            }

            if (is_plugin_active(plugin: Plugin_Basename::YITH_COST_OF_GOODS->value)) {
                YITH_Cost_Of_Goods::new_instance()->hook();
            }
        }
    }
}
