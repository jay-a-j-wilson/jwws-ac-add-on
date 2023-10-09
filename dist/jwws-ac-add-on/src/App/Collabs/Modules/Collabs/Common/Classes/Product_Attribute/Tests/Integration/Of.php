<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Product\Tests\Integration;

use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Product\Product;
use JWWS\ACA\Test\Traits\Printable;
use WC_Product;
use WC_Product_Variation;
use WP_UnitTestCase;
use function wp_delete_post;

/**
 * @covers \JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Product\Product
 *
 * @internal
 *
 * @small
 */
final class Of extends WP_UnitTestCase {
    use Printable;

    private static WC_Product $product;

    public static function setUpBeforeClass(): void {
        self::$product = new WC_Product();
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
            expected: Product::class,
            actual: Product::of(id: self::$product->get_id()),
        );
    }
}
