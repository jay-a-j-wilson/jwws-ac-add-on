<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Attribute_Position\Tests\Unit;

use JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Attribute_Position\Attribute_Position;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Attribute_Position\Attribute_Position
 *
 * @internal
 */
final class New_Instance extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Attribute_Position::class,
            actual: Attribute_Position::new_instance(),
        );
    }
}
