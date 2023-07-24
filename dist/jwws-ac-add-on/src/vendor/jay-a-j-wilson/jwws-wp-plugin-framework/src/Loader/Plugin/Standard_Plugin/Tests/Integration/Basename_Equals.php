<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 24-July-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Standard_Plugin\Subclasses\Standard_Plugin\Tests\Integration;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Standard_Plugin\Standard_Plugin;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Standard_Plugin\Standard_Plugin
 *
 * @internal
 *
 * @small
 */
final class Basename_Equals extends \WP_UnitTestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => slug: $arg_1, fallback name: $arg_2, name: $arg_3
     */
    public function pass(string $arg_1, string $arg_2, string $arg_3): void {
        self::assertTrue(
            condition: Standard_Plugin::of_slug(slug: $arg_1, fallback_name: $arg_2)
                ->basename_equals(basename: $arg_3),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'not installed' => ['plugin', 'Plugin', 'plugin/plugin.php'];

        yield 'installed' => ['akismet', 'Akismet', 'akismet/akismet.php'];
    }
}
