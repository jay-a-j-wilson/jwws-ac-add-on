<?php declare(strict_types=1);

namespace JWWS\ACA\App;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\{
    Loader,
    Plugin\Plugin,
    Plugin\Standard_Plugin\Standard_Plugin
};
use JWWS\ACA\Modules\{
    Products_Wizard,
    WooCommerce
};

if (! \defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class App {
    public static function of(Loader $loader): self {
        return new self(loader: $loader);
    }

    /**
     * @return void
     */
    private function __construct(private readonly Loader $loader) {}

    /**
     * Hooks into WordPress
     */
    public function hook(): void {
        add_action('wp_loaded', [$this, 'hook_loader']);
        add_action('ac/ready', [$this, 'register']);
    }

    public function hook_loader(): void {
        $this->loader->hook();
    }

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
