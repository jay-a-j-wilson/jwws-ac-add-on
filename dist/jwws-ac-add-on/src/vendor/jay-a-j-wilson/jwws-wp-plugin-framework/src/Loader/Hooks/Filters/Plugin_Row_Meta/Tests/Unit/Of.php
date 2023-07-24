<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 24-July-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Hooks\Filters\Plugin_Row_Meta\Tests\Unit;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Hooks\Filters\Plugin_Row_Meta\Plugin_Row_Meta;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Plugin;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Loader\Hooks\Filters\Plugin_Row_Meta\Plugin_Row_Meta
 *
 * @internal
 *
 * @small
 */
final class Of extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Plugin_Row_Meta::class,
            actual: Plugin_Row_Meta::of(
                plugin: self::createStub(originalClassName: Plugin::class),
            ),
        );
    }
}
