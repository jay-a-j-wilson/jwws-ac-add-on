<?php

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Hooks\Actions;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\{
    Hooks\Actions\Admin_Notices\Admin_Notices,
    Plugin\Plugin
};

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 */
class Admin_Init {
    /**
     * @param Plugin $plugin
     *
     * @return self
     */
    public static function hook(Plugin $plugin): void {
        add_filter(
            'admin_init',
            [new self(plugin: $plugin), 'callback'],
            10,
            2,
        );
    }

    /**
     * @param Plugin $plugin
     */
    private function __construct(private Plugin $plugin) {
    }

    /**
     * Fires as an admin screen or script is being initialized.
     *
     * @docs https://developer.wordpress.org/reference/hooks/admin_init/
     *
     * @return void
     */
    public function callback(): void {
        if ($this->plugin->can_activate()) {
            return;
        }

        foreach ($this->plugin->get_inactive_dependencies() as $dependant_plugin) {
            Admin_Notices::hook(
                dependant_plugin: $dependant_plugin,
                plugin: $this->plugin,
            );
        }

        $this->plugin->deactivate();

        unset($_GET['activate']);
    }
}
