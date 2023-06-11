<?php

namespace JWWS\ACA;

// use JWWS\ACA\Deps\JWWS\WPPF\Loader\{
//     Plugin\Plugin,
//     Loader
// };
use JWWS\WPPF\Loader\{
    Plugin\Plugin,
    Loader
};
use JWWS\ACA\Modules\{
    WooCommerce,
    Products_Wizard
};

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * App.
 */
class App {
    /**
     * @return void
     */
    public static function hook(): void {
        $self = new self();
        add_action('wp_loaded', [$self, 'load']);
        add_action('ac/ready', [$self, 'register']);
    }

    /**
     * @return void
     */
    public function load(): void {
        Loader::of(
            plugin: Plugin::of_slug(
                slug: PLUGIN_DIR,
                fallback_name: 'Admin Colums Add-On',
            )
                ->add_dependencies(
                    plugins: Plugin::of_slug(
                        slug: 'admin-columns-pro',
                        fallback_name: 'Admin Columns Pro',
                    ),
                ),
        )
            ->hook_admin_init()
            ->hook_deactivated_plugin()
        ;
    }

    /**
     * @return void
     */
    public function register(): void {
        if (! is_plugin_active(plugin: 'admin-columns-pro/admin-columns-pro.php')) {
            return;
        }

        if (is_plugin_active(plugin: 'woocommerce/woocommerce.php')) {
            WooCommerce\Root::hook();

            if (is_plugin_active(plugin: 'woocommerce-products-wizard/woocommerce-products-wizard.php')) {
                Products_Wizard\Root::hook();
            }
        }
    }
}
