<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Traits\Products\Profits\Sub_Value_Objects\Profit\Sub_Value_Objects\Price\Tests\Unit;

use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Traits\Products\Profits\Sub_Value_Objects\Profit\Sub_Value_Objects\Price\Price;
use WP_UnitTestCase;

/**
 * @covers \JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Traits\Products\Profits\Sub_Value_Objects\Profit\Sub_Value_Objects\Price\Price
 *
 * @internal
 *
 * @small
 */
final class Of extends WP_UnitTestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Price::class,
            actual: Price::of(num: 0),
        );
    }
}