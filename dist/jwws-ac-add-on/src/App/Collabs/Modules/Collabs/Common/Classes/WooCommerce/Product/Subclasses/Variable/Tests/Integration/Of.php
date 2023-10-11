<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Subclasses\Variable\Tests\Integration;

use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Subclasses\Variable\Variable;
use JWWS\ACA\Test\Traits\Printable;
use WC_Product_Variable;
use WP_UnitTestCase;
use function wp_delete_post;

/**
 * @covers \JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Subclasses\Variable\Variable
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
            expected: Variable::class,
            actual: Variable::of(id: self::$product->get_id()),
        );
    }
}
