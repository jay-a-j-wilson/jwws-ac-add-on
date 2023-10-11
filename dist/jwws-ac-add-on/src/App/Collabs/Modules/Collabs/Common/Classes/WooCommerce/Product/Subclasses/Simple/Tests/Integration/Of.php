<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Subclasses\Simple\Tests\Integration;

use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Subclasses\Simple\Simple;
use JWWS\ACA\Test\Traits\Printable;
use WC_Product;
use WP_UnitTestCase;
use function wp_delete_post;

/**
 * @covers \JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Subclasses\Simple\Simple
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
            expected: Simple::class,
            actual: Simple::of(id: self::$product->get_id()),
        );
    }
}
