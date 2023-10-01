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
final class Cost extends WP_UnitTestCase {
    use Printable;

    private static WC_Product_Variable $product;

    public static function setUpBeforeClass(): void {
        self::$product = new WC_Product_Variable();

        // product title
        self::$product->set_name(name: 'Hat');
        self::$product->set_slug(slug: 'hat');
        // in current shop currency
        self::$product->set_price(price: 50.00);

        self::$product->save();

        update_post_meta(
            post_id: self::$product->get_id(),
            meta_key:'yith_cog_cost',
            meta_value: 20.00
        );
    }

    public static function tearDownAfterClass(): void {
        wp_delete_post(postid: self::$product->get_id());
    }

    /**
     * @test
     */
    public function pass(): void {
        self::print(self::$product);
        self::assertSame(
            expected: 50.00,
            actual: Product_Variable::of(id: self::$product->get_id())->cost(),
        );
    }
}
