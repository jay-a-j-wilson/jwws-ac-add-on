<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Tests\Unit;

use JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\WooCommerce;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\WooCommerce
 *
 * @internal
 */
final class New_Instance extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: WooCommerce::class,
            actual: WooCommerce::new_instance(),
        );
    }
}
