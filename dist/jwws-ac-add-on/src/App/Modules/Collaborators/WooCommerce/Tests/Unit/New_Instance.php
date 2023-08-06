<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Collaborators\WooCommerce\Tests\Unit;

use JWWS\ACA\App\Modules\Collaborators\WooCommerce\WooCommerce;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\ACA\App\Modules\Collaborators\WooCommerce\WooCommerce
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