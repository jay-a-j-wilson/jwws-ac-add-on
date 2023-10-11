<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Traits\Products\Profits\Sub_Value_Objects\Profit\Tests\Integration;

use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Traits\Products\Profits\Sub_Value_Objects\Profit\Profit;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Traits\Products\Profits\Sub_Value_Objects\Profit\Sub_Value_Objects\Cost\Cost;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Traits\Products\Profits\Sub_Value_Objects\Profit\Sub_Value_Objects\Price\Price;
use WP_UnitTestCase;

/**
 * @covers \JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Traits\Products\Profits\Sub_Value_Objects\Profit\Profit
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
            expected: Profit::class,
            actual: Profit::of(
                price: Price::of(num: 1.00),
                cost: Cost::of(num: 0.50),
            ),
        );
    }
}