<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Subclasses\Variation\Tests\Integration;

use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Subclasses\Variation\Variation;
use JWWS\ACA\Test\Traits\Printable;
use WC_Product_Variation;
use WP_UnitTestCase;
use function wp_delete_post;

/**
 * @covers \JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Subclasses\Variation\Variation
 *
 * @internal
 *
 * @small
 */
final class Of extends WP_UnitTestCase {
    use Printable;

    private static WC_Product_Variation $product;

    public static function setUpBeforeClass(): void {
        self::$product = new WC_Product_Variation();
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
            expected: Variation::class,
            actual: Variation::of(id: self::$product->get_id()),
        );
    }
}
