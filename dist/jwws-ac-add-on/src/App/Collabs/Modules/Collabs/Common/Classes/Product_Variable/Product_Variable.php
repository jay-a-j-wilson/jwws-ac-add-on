<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Product_Variable;

use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Traits\Profits\Profits;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Traits\Profits\Sub_Value_Objects\Profit\Profit;
use WC_Product_Variable;

final class Product_Variable extends WC_Product_Variable {
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
}
