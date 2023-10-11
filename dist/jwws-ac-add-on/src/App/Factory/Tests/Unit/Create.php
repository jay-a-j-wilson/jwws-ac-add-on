<?php declare(strict_types=1);

namespace JWWS\ACA\App\Factory\Tests\Unit;

use JWWS\ACA\App\Factory\App_Factory;
use PHPUnit\Framework\TestCase;
use JWWS\ACA\App\App;

/**
 * @covers \JWWS\ACA\App\Factory\App_Factory
 *
 * @internal
 */
final class Create extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: App::class,
            actual: App_Factory::new_instance()->create(),
        );
    }
}
