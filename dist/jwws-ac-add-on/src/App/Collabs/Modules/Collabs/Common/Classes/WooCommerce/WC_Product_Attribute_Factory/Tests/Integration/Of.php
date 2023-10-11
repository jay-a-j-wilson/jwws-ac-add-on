<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\WC_Product_Attribute_Factory\Tests\Integration;

use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\WC_Product_Attribute_Factory\WC_Product_Attribute_Factory;
use JWWS\ACA\Test\Traits\Printable;
use WP_Term;
use WP_UnitTestCase;

/**
 * @covers \JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\WC_Product_Attribute_Factory\WC_Product_Attribute_Factory
 *
 * @internal
 *
 * @small
 */
final class Of extends WP_UnitTestCase {
    use Printable;

    private static WP_Term $term;

    public static function setUpBeforeClass(): void {
        self::$term = WP_Term::get_instance(term_id: 1);
    }

    public static function tearDownAfterClass(): void {
        // self::$term = null;
    }

    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: WC_Product_Attribute_Factory::class,
            actual: WC_Product_Attribute_Factory::of(term: self::$term)
        );
    }
}
