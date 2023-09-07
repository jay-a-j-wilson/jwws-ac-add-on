<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Profit\Common\Product\Tests\Integration;

use JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Profit\Common\Product\Product;
use JWWS\ACA\Test\Traits\Printable;
use WC_Product_Simple;
use WP_UnitTestCase;
use function wc_create_product;
use function wc_get_product;

/**
 * @covers \JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Profit\Common\Product\Product
 *
 * @internal
 *
 * @small
 */
final class Of extends WP_UnitTestCase {
    use Printable;

    /**
     * ! Invalid data store exception.
     *
     * @xtest
     */
    public function pass(): void {
        self::print('xxx');
        $this->create_product();
        // self::print('xxx');
        // self::print(wc_get_products([]));
        // self::assertInstanceOf(
        //     expected: Product::class,
        //     actual: Product::of(id: 1),
        // );
    }

    private function create_product(): void {
        // $product = new WC_Product_Simple();

        // $product->set_name('Wizard Hat'); // product title
        // $product->set_slug('medium-size-wizard-hat-in-new-york');
        // $product->set_regular_price(500.00); // in current shop currency

        // $product->save();

        $product = wc_get_product([
            'name'          => 'Sample Product',
            'type'          => 'simple',
            'regular_price' => '20.00',
            'description'   => 'This is a sample product.',
        ]);
    }
}
