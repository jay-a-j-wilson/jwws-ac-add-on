<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Subclasses\Simple\Tests\Integration;

use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Subclasses\Simple\Simple;
use JWWS\ACA\Test\Traits\Printable;
use WC_Product;
use WP_UnitTestCase;
use function update_post_meta;
use function wp_delete_post;

/**
 * @covers \JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Subclasses\Simple\Simple
 *
 * @internal
 *
 * @small
 */
final class Cost extends WP_UnitTestCase {
    use Printable;

    private static WC_Product $product;

    public static function setUpBeforeClass(): void {
        self::$product = new WC_Product();
        self::$product->save();

        update_post_meta(
            post_id: self::$product->get_id(),
            meta_key: 'yith_cog_cost',
            meta_value: 20.00,
        );
    }

    public static function tearDownAfterClass(): void {
        wp_delete_post(postid: self::$product->get_id());
    }

    /**
     * @test
     */
    public function pass(): void {
        self::assertSame(
            expected: '20',
            actual: Simple::of(id: self::$product->get_id())
                ->cost(),
        );
    }
}
