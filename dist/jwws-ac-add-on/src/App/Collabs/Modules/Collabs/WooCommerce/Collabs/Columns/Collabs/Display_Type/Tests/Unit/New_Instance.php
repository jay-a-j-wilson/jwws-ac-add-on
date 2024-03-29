<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Display_Type\Tests\Unit;

use JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Display_Type\Display_Type;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Display_Type\Display_Type
 *
 * @internal
 */
final class New_Instance extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Display_Type::class,
            actual: Display_Type::new_instance(),
        );
    }
}
