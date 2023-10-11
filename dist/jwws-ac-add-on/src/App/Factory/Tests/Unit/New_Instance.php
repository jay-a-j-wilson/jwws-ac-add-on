<?php declare(strict_types=1);

namespace JWWS\ACA\App\Factory\Tests\Unit;

use JWWS\ACA\App\Factory\App_Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\App\Factory\App_Factory
 *
 * @internal
 */
final class New_Instance extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: App_Factory::class,
            actual: App_Factory::new_instance(),
        );
    }
}
