<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 07-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Standard_Plugin\Subclasses\Standard_Plugin\Tests\Integration;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Plugin;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Tests\Integration\Fixtures\Fixture;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Standard_Plugin\Standard_Plugin
 *
 * @internal
 *
 * @small
 */
final class Can_Activate extends Fixture {
    /**
     * @test
     */
    public function pass_no_dependencies(): Plugin {
        self::assertTrue(condition: self::$basic_plugin->can_activate());

        return self::$basic_plugin;
    }

    /**
     * @test
     *
     * @depends pass_no_dependencies
     */
    public function pass_has_inactive_dependencies(Plugin $plugin): Plugin {
        deactivate_plugins(plugins: self::$akismet_plugin->basename());

        self::assertFalse(
            condition: $plugin
                ->add_dependencies(plugins: self::$akismet_plugin)
                ->can_activate(),
        );

        return self::$basic_plugin;
    }

    /**
     * @test
     *
     * @depends pass_has_inactive_dependencies
     */
    public function pass_has_no_inactive_dependencies(Plugin $plugin): void {
        activate_plugin(plugin: self::$akismet_plugin->basename());

        self::assertTrue(condition: $plugin->can_activate());
    }
}
