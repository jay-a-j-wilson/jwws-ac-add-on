<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Traits\Products\Profits\Sub_Value_Objects\Profit\Sub_Value_Objects\Cost\Tests\Unit;

use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Traits\Products\Profits\Sub_Value_Objects\Profit\Sub_Value_Objects\Cost\Cost;
use WP_UnitTestCase;

/**
 * @covers \JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Traits\Products\Profits\Sub_Value_Objects\Profit\Sub_Value_Objects\Cost\Cost
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
            expected: Cost::class,
            actual: Cost::of(num: 0),
        );
    }
}