<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Product_Variation;

use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Traits\Profits\Profits;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Traits\Profits\Sub_Value_Objects\Profit\Profit;
use WC_Product_Variation;

final class Product_Variation extends WC_Product_Variation {
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

    public function name() {
        $last_hyphen_position = strrpos(
            haystack: $this->get_name(),
            needle: '-'
        );

        if ($last_hyphen_position === false) {
            return '';
        }

        return trim(
            string: substr(
                string: $this->get_name(),
                offset: $last_hyphen_position + 1,
            ),
        );
    }
}
