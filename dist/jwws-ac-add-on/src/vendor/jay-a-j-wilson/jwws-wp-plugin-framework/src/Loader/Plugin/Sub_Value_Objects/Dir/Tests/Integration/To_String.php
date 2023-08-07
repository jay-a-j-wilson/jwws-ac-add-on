<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 07-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Dir\Tests\Integration;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Dir\Dir;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Dir\Dir
 *
 * @internal
 *
 * @small
 */
final class To_String extends \WP_UnitTestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertStringEndsWith(
            suffix: '/wp-content/plugins/',
            string: Dir::create()->__toString(),
        );
    }
}
