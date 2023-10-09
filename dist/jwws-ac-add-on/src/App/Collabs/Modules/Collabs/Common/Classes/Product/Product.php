<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Product;

use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Traits\Profits\Profits;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Traits\Profits\Sub_Value_Objects\Profit\Profit;
use WC_Product;
use WC_Product_Attribute;

final class Product extends WC_Product {
    use Profits;

    public static function of(int $id): self {
        return new self(
            product: $id,
        );
    }

    private Profit $profit;

    private function __construct(int $product = 0) {
        parent::__construct($product);

        $this->set_profit();
    }

    public function attribute(string $key): WC_Product_Attribute {
        return $this->get_attributes()[$key];
    }

    public function has_attribute(string $key): bool {
        return array_key_exists(
            key: $key,
            array: $this->get_attributes(),
        );
    }
}
