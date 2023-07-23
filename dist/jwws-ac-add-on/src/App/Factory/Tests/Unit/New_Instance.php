<?php declare(strict_types=1);

namespace JWWS\ACA\App\Factory\Tests\Unit;

use JWWS\ACA\App\Factory\Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\App\Factory\Factory
 *
 * @internal
 */
final class New_Instance extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Factory::class,
            actual: Factory::new_instance(),
        );
    }
}
