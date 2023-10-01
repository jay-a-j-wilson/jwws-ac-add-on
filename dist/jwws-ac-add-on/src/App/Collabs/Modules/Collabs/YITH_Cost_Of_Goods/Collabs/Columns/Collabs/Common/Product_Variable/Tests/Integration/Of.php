<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Common\Product\Tests\Integration;

use JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Common\Product_Variable\Product_Variable;
use JWWS\ACA\Test\Traits\Printable;
use WC_Product_Variable;
use WP_UnitTestCase;

/**
 * @covers \JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Common\Product_Variable\Product_Variable
 *
 * @internal
 *
 * @small
 */
final class Of extends WP_UnitTestCase {
    use Printable;

    private static WC_Product_Variable $product;

    public static function setUpBeforeClass(): void {
        self::$product = new WC_Product_Variable();

        // product title
        self::$product->set_name(name: 'Hat');
        self::$product->set_slug(slug: 'hat');
        // in current shop currency
        self::$product->set_regular_price(price: 50.00);

        self::$product->save();
    }

    public static function tearDownAfterClass(): void {
        wp_delete_post(postid: self::$product->get_id());
    }

    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Product_Variable::class,
            actual: Product_Variable::of(id: self::$product->get_id()),
        );
    }
}
