<?php
/**
 * @license proprietary?
 *
 * Modified using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Actions\Admin_Notices\Tests\Integration;

use JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Actions\Admin_Notices\Admin_Notices;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Tests\Integration\Fixtures\Akismet_Plugin_Factory;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Tests\Integration\Fixtures\Basic_Plugin_Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Actions\Admin_Notices\Admin_Notices
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
                plugin: Basic_Plugin_Factory::create_and_get(),
                dependency: Akismet_Plugin_Factory::create_and_get(),
            ),
        );
    }
}
