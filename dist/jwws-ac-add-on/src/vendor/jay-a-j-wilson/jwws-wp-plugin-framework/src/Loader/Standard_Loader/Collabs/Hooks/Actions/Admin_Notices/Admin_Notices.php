<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 06-September-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Actions\Admin_Notices;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Plugin;
use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
use function add_action;

// Security::stop_direct_access();

final class Admin_Notices {
    /**
     * Factory method.
     */
    public static function of(Plugin $plugin, Plugin $dependency): self {
        return new self(
            plugin: $plugin,
            dependency: $dependency,
        );
    }

    /**
     * @return void
     */
    private function __construct(
        private Plugin $plugin,
        private Plugin $dependency,
    ) {}

    /**
     * Hooks into 'admin_notices' filter.
     */
    public function hook(): void {
        add_action(
            'admin_notices',
            [$this, 'callback'],
            10,
            2,
        );
    }

    /**
     * Prints admin screen notices.
     *
     * @docs https://developer.wordpress.org/reference/hooks/admin_notices/
     */
    public function callback(): void {
        echo Template::of(path: __DIR__ . '/templates/template.html.php')
            ->assign(key: 'plugin_name', value: $this->plugin->name())
            ->assign(key: 'dependency_name', value: $this->dependency->name())
            ->output()
        ;
    }
}
