<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Profit\Common\Product\Tests\Integration;

use JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Profit\Common\Product\Product;
use WP_UnitTestCase;

/**
 * @covers \JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Profit\Common\Product\Product
 *
 * @internal
 *
 * @small
 */
final class New_Instance extends WP_UnitTestCase {
    /**
     * @xtest
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Product::class,
            actual: Product::new_instance(),
        );
    }
}