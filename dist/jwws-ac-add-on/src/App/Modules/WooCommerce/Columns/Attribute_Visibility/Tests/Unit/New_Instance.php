<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\WooCommerce\Columns\Attribute_Visibility\Tests\Unit;

use JWWS\ACA\App\Modules\WooCommerce\Columns\Attribute_Visibility\Attribute_Visibility;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\App\Modules\WooCommerce\Columns\Attribute_Visibility\Attribute_Visibility
 *
 * @internal
 */
final class New_Instance extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Attribute_Visibility::class,
            actual: Attribute_Visibility::new_instance(),
        );
    }
}
