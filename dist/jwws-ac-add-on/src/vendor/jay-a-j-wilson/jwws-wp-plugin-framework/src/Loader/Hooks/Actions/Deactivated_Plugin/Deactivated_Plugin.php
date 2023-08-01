<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Hooks\Actions\Deactivated_Plugin;

use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Plugin;

// Security::stop_direct_access();

final class Deactivated_Plugin {
    /**
     * Factory method.
     */
    public static function of(Plugin $plugin): self {
        return new self(
            plugin: $plugin,
        );
    }

    /**
     * @return void
     */
    private function __construct(private Plugin $plugin) {}

    /**
     * Hooks into WordPress.
     */
    public function hook(): void {
        add_action(
            'deactivated_plugin',
            [$this, 'callback'],
            10,
            1,
        );
    }

    /**
     * Fires after a plugin is deactivated.
     *
     * @link https://developer.wordpress.org/reference/hooks/deactivated_plugin/
     *
     * @param string $plugin path to the plugin file relative to the plugins
     *                       directory
     */
    public function callback(string $plugin): void {
        if (! $this->plugin->contains_dependency(basename: $plugin)) {
            return;
        }

        $this->plugin->deactivate();
    }
}
