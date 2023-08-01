<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Standard_Plugin\Subclasses\Standard_Plugin\Tests\Integration\Dependencies\Status;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Plugin;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Standard_Plugin\Standard_Plugin;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Tests\Integration\Fixtures\Akismet_Plugin_Factory;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Tests\Integration\Fixtures\Basic_Plugin_Factory;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Standard_Plugin\Standard_Plugin
 *
 * @internal
 *
 * @small
 */
final class Inactive_Dependencies extends \WP_UnitTestCase {
    protected static Plugin $basic_plugin;

    protected static Plugin $akismet_plugin;

    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::$basic_plugin   = Basic_Plugin_Factory::create_and_get();
        self::$akismet_plugin = Akismet_Plugin_Factory::create_and_get();
    }

    /**
     * @test
     */
    public function pass(): Plugin {
        deactivate_plugins(plugins: self::$akismet_plugin->basename());

        self::assertCount(
            expectedCount: 2,
            haystack: self::$basic_plugin
                ->add_dependencies(
                    self::$akismet_plugin,
                    Standard_Plugin::of_slug(
                        slug: 'plugin-dependency',
                        fallback_name: 'Plugin Dependency',
                    ),
                )
                ->inactive_dependencies(),
        );

        return self::$basic_plugin;
    }

    /**
     * @test
     *
     * @depends pass
     */
    public function pass_activate(Plugin $plugin): Plugin {
        activate_plugin(plugin: self::$akismet_plugin->basename());

        self::assertCount(
            expectedCount: 1,
            haystack: $plugin->inactive_dependencies(),
        );

        return $plugin;
    }

    /**
     * @test
     *
     * @depends pass_activate
     */
    public function pass_deactivate(Plugin $plugin): void {
        deactivate_plugins(plugins: self::$akismet_plugin->basename());

        self::assertCount(
            expectedCount: 2,
            haystack: $plugin->inactive_dependencies(),
        );
    }
}
