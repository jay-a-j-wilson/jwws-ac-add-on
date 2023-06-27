<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Tests\Unit;

use JWWS\ACA\App\Modules\Modules;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\App\Modules\Modules
 *
 * @internal
 */
final class New_Instance extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Modules::class,
            actual: Modules::new_instance(),
        );
    }
}
