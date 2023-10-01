<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Common\Product;

use JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Common\Product\Sub_Value_Objects\Profit\Profit;
use JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Common\Product\Sub_Value_Objects\Profit\Sub_Value_Objects\Cost\Cost;
use JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Common\Product\Sub_Value_Objects\Profit\Sub_Value_Objects\Price\Price;
use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Meta\Subclasses\Post_Meta\Post_Meta;
use WC_Product;

final class Product extends WC_Product {
    public static function of(int $id): self {
        return new self(
            product: $id,
        );
    }

    private Profit $profit;

    private function __construct(int $product = 0) {
        parent::__construct($product);

        $this->profit = Profit::of(
            price: Price::of(num: (float) $this->get_price()),
            cost: Cost::of(num: (float) $this->cost()),
        );
    }

    public function cost(): string {
        return Post_Meta::of(id: $this->get_id())
            ->find_by_key(key: 'yith_cog_cost')
        ;
    }

    public function profit_amount(): string {
        return $this->format(num: $this->profit->amount());
    }

    public function profit_margin(): string {
        return $this->format(num: $this->profit->margin());
    }

    public function profit_markup(): string {
        return $this->format(num: $this->profit->markup());
    }

    private function format(float $num): string {
        return $this->cost() === ''
            ? ''
            : number_format(
                num: $num,
                decimals: 2,
                thousands_separator: '',
            );
    }
}
