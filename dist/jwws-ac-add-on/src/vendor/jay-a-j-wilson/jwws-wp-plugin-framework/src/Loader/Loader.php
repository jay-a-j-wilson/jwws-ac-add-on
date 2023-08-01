<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader;

use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Hooks\Actions\Admin_Init\Admin_Init;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Hooks\Actions\Deactivated_Plugin\Deactivated_Plugin;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Plugin;

// Security::stop_direct_access();

/**
 * Ensures given plugin loads correctly.
 *
 * Prevents plugin activation if dependant plugins are not active. Disables a
 * plugin if dependant plugin is deactivated.
 */
final class Loader {
    /**
     * Factory method.
     */
    public static function of(Plugin $plugin): self {
        return new self(
            plugin: $plugin,
            admin_init: Admin_Init::of(plugin: $plugin),
            deactivated_plugin: Deactivated_Plugin::of(plugin: $plugin),
        );
    }

    /**
     * @return void
     */
    private function __construct(
        private Plugin $plugin,
        private Admin_Init $admin_init,
        private Deactivated_Plugin $deactivated_plugin,
    ) {}

    /**
     * Hooks into WordPress.
     */
    public function hook(): void {
        $this->admin_init->hook();
        $this->deactivated_plugin->hook();
    }

    /**
     * Checks if loader can activate.
     */
    public function can_activate(): bool {
        return $this->plugin->can_activate();
    }
}
