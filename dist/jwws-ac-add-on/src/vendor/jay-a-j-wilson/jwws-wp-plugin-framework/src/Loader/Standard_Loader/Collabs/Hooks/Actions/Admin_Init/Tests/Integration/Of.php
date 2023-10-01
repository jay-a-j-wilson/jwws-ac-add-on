<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 01-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Actions\Admin_Init\Tests\Integration;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Actions\Admin_Init\Admin_Init;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Tests\Integration\Fixtures\Basic_Plugin_Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Actions\Admin_Init\Admin_Init
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
            expected: Admin_Init::class,
            actual: Admin_Init::of(plugin: Basic_Plugin_Factory::create_and_get()),
        );
    }
}
