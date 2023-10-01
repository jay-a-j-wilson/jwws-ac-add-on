<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Standard_Plugin\Subclasses\Standard_Plugin\Tests\Integration\Toggle;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Plugin;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Tests\Integration\Fixtures\Akismet_Plugin_Factory;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Standard_Plugin\Standard_Plugin
 *
 * @internal
 *
 * @small
 */
final class Deactivate extends \WP_UnitTestCase {
    protected static Plugin $akismet_plugin;

    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::$akismet_plugin = Akismet_Plugin_Factory::create_and_get();
    }

    /**
     * @test
     */
    public function pass_is_active(): Plugin {
        activate_plugin(plugin: self::$akismet_plugin->basename()->__toString());

        self::assertTrue(
            condition: is_plugin_active(
                plugin: self::$akismet_plugin->basename()->__toString(),
            ),
        );

        return self::$akismet_plugin;
    }

    /**
     * @test
     *
     * @depends pass_is_active
     */
    public function pass_is_inactivate(Plugin $plugin): void {
        self::assertFalse(
            condition: is_plugin_active(
                plugin: $plugin->deactivate()->basename()->__toString(),
            ),
        );
    }
}
