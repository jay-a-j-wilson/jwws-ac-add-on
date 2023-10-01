<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Name\Tests\Integration;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Name\Name;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Name\Name
 *
 * @internal
 *
 * @small
 */
final class Of extends \WP_UnitTestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => args [$arg_1, $arg_2]
     */
    public function pass(string $arg_1, string $arg_2): void {
        self::assertSame(
            expected: $arg_2,
            actual: Name::of(basename: $arg_1, fallback_name: $arg_2)->value,
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'installed' => [
            'akismet/akismet.php',
            'Akismet Anti-Spam: Spam Protection',
        ];

        yield 'not installed' => ['plugin/plugin.php', 'Plugin'];
    }
}
