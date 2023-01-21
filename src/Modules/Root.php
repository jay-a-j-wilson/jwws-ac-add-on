<?php

namespace JWWS\Admin_Columns_Add_On\Modules;

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
        if (is_plugin_active(plugin: 'admin-columns-pro/admin-columns-pro.php')) {
            add_action(
                'ac/ready',
                [new self(), 'register'],
            );
        }
    }

    /**
     * @return void
     */
    public function register(): void {
        Groups\Root::hook();
        Columns\Root::hook();
    }
}
