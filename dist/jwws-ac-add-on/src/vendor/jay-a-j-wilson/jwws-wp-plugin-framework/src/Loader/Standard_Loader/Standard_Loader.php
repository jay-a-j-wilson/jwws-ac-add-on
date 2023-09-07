<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 06-September-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Loader;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Plugin;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Actions\Admin_Init\Admin_Init;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Actions\Deactivated_Plugin\Deactivated_Plugin;

// Security::stop_direct_access();

final class Standard_Loader implements Loader {
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

    public function hook(): void {
        $this->admin_init->hook();
        $this->deactivated_plugin->hook();
    }

    public function can_activate(): bool {
        return $this->plugin->can_activate();
    }
}
