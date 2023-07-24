<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 24-July-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Hooks\Actions\Admin_Notices\Tests\Unit;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Hooks\Actions\Admin_Notices\Admin_Notices;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Plugin;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Loader\Hooks\Actions\Admin_Notices\Admin_Notices
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
            expected: Admin_Notices::class,
            actual: Admin_Notices::of(
                plugin: self::createStub(originalClassName: Plugin::class),
                dependency: self::createStub(originalClassName: Plugin::class),
            ),
        );
    }
}
