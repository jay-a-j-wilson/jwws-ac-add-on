<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product;

use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product_Attribute\Product_Attribute;
use WC_Product_Attribute;

interface Product {
    public static function of(int $id): self;

    public function cost(): string;

    public function profit_amount(): string;

    public function profit_amount_with_sign(): string;

    public function profit_margin(): string;

    public function profit_margin_with_sign(): string;

    public function profit_markup(): string;

    public function profit_markup_with_sign(): string;

    public function wc_attribute(string $key): WC_Product_Attribute;

    public function attribute(string $key): Product_Attribute;

    public function delete_attribute(string $key): void;

    public function update_attribute(
        string $key,
        WC_Product_Attribute $value,
    ): void;

    /**
     * Returns the products variation name.
     *
     * Example: 'Product Name - Variation' will return 'Variation'.
     * Returns blank ('') if not a variation product.
     */
    public function variation_name(): string;
}
