<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 24-July-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Hooks\Action\Deactivated_Plugin\Tests\Unit;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Hooks\Actions\Deactivated_Plugin\Deactivated_Plugin;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Plugin;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Loader\Hooks\Actions\Deactivated_Plugin\Deactivated_Plugin
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
            expected: Deactivated_Plugin::class,
            actual: Deactivated_Plugin::of(
                plugin: self::createStub(originalClassName: Plugin::class),
            ),
        );
    }
}
