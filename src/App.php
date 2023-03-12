<?php

namespace JWWS\ACA;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\{
    Plugin\Plugin,
    Loader
};
use JWWS\ACA\Modules\{
    Groups,
    Columns
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
        Loader::create(
            plugin: Plugin::create_with_slug(slug: PLUGIN_DIR)
                ->add_dependencies(
                    Plugin::create_with_slug(
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

        Groups\Root::hook();
        Columns\Root::hook();
    }
}
