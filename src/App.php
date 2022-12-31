<?php

namespace JWWS\Admin_Columns_Add_On;

use JWWS\WP_Plugin_Framework\Loader\Plugin;

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
        add_action(
            'wp_loaded',
            [__CLASS__, 'register'],
        );
    }

    /**
     * @return void
     */
    public static function register(): void {
        (new self())->load_entry_point();
    }

    /**
     * @return void
     */
    public function load_entry_point(): void {
        $plugin = Plugin::create_with_slug(
            name: 'WP Open Row Actions',
            slug: PLUGIN_DIR,
        );

        $dependant_plugins = [
            Plugin::create_with_slug(
                name: 'Admin Columns Pro',
                slug: 'admin-columns-pro',
            ),
            Plugin::create_with_slug(
                name: 'WooCommerce',
                slug: 'woocommerce',
            ),
        ];

        (new Entry_Point(
            plugin: $plugin,
            dependant_plugins: $dependant_plugins,
        ))->load();
    }
}
