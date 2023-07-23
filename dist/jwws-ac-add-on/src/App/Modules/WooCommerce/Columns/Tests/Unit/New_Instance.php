<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\WooCommerce\Columns\Tests\Unit;

use JWWS\ACA\App\Modules\WooCommerce\Columns\Columns;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\App\Modules\WooCommerce\Columns\Columns
 *
 * @internal
 */
final class New_Instance extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Columns::class,
            actual: Columns::new_instance(),
        );
    }
}
