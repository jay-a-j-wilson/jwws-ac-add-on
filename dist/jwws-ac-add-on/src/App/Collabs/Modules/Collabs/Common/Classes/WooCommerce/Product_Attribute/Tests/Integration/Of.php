<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product_Attribute\Tests\Integration;

use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product_Attribute\Product_Attribute;
use JWWS\ACA\Test\Traits\Printable;
use WC_Product;
use WC_Product_Attribute;
use WP_UnitTestCase;
use function wp_delete_post;

/**
 * @covers \JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product_Attribute\Product_Attribute
 *
 * @internal
 *
 * @small
 */
final class Of extends WP_UnitTestCase {
    use Printable;

    private static WC_Product_Attribute $product_attribute;

    public static function setUpBeforeClass(): void {
        self::$product_attribute = new WC_Product_Attribute();
    }

    public static function tearDownAfterClass(): void {
        // self::$product_attribute = null;
    }

    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Product_Attribute::class,
            actual: Product_Attribute::of(attribute: self::$product_attribute),
        );
    }
}
