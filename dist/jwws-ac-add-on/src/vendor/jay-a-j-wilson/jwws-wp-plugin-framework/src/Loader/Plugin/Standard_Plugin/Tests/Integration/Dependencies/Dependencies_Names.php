<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Standard_Plugin\Subclasses\Standard_Plugin\Tests\Integration\Dependencies;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Standard_Plugin\Standard_Plugin;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Tests\Integration\Fixtures\Basic_Plugin_Factory;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Standard_Plugin\Standard_Plugin
 *
 * @internal
 *
 * @small
 */
final class Dependencies_Names extends \WP_UnitTestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     */
    public function pass(array $arg_1, bool $arg_2): void {
        self::assertSame(
            expected: $arg_2,
            actual: $arg_1 === Basic_Plugin_Factory::create()
                ->value
                ->add_dependencies(
                    Standard_Plugin::of_slug(
                        slug: 'plugin-dependency-1',
                        fallback_name: 'Plugin Dependency 1',
                    ),
                    Standard_Plugin::of_slug(
                        slug: 'plugin-dependency-2',
                        fallback_name: 'Plugin Dependency 2',
                    ),
                )
                ->dependencies_names()
                ->to_array(),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'all' => [
            ['Plugin Dependency 1', 'Plugin Dependency 2'],
            true,
        ];

        yield 'some' => [
            ['Plugin Dependency 1', 'Plugin Dependency 3'],
            false,
        ];

        yield 'none' => [
            ['Plugin Dependency 3', 'Plugin Dependency 4'],
            false,
        ];
    }
}
