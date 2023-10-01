<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Standard_Plugin\Subclasses\Standard_Plugin\Tests\Integration\Dependencies;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Plugin;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Standard_Plugin\Standard_Plugin;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Tests\Integration\Fixtures\Basic_Plugin_Factory;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Standard_Plugin\Standard_Plugin
 *
 * @internal
 *
 * @small
 */
final class Contains_Dependency extends \WP_UnitTestCase {
    protected static Plugin $basic_plugin;

    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::$basic_plugin = Basic_Plugin_Factory::create_and_get();
    }

    /**
     * @test
     */
    public function pass_empty(): Plugin {
        self::assertFalse(
            condition: self::$basic_plugin->contains_dependency(
                basename: 'dependency/dependency.php',
            ),
        );

        return self::$basic_plugin;
    }

    /**
     * @test
     *
     * @depends pass_empty
     */
    public function pass_has_dependency(Plugin $plugin): void {
        self::assertTrue(
            condition: $plugin
                ->add_dependencies(
                    plugins: Standard_Plugin::of_basename(
                        basename: 'dependency/dependency.php',
                        fallback_name: 'Plugin Dependency',
                    ),
                )
                ->contains_dependency(basename: 'dependency/dependency.php'),
        );
    }
}
