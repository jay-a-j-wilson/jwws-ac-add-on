<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Common\Product\Sub_Value_Objects\Profit;

use JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Common\Product\Sub_Value_Objects\Profit\Sub_Value_Objects\Cost\Cost;
use JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Common\Product\Sub_Value_Objects\Profit\Sub_Value_Objects\Price\Price;

final class Profit {
    public static function of(Price $price, Cost $cost): self {
        return new self(
            price: $price,
            cost: $cost,
        );
    }

    private function __construct(
        private readonly Price $price,
        private readonly Cost $cost,
    ) {}

    /**
     * Calculates the profit dollar ($) amount.
     */
    public function amount(): float {
        return $this->price->value() - $this->cost->value();
    }

    /**
     * Calculates the profit percentage (%) margin.
     */
    public function margin(): float {
        // Avoids division by zero error.
        if ($this->price->value() === (float) 0) {
            return 0;
        }

        return ($this->amount() / $this->price->value()) * 100;
    }

    /**
     * Calculates the profit percentage (%) markup.
     */
    public function markup(): float {
        // Avoids division by zero error.
        if ($this->cost->value() === (float) 0) {
            return 0;
        }

        return ($this->amount() / $this->cost->value()) * 100;
    }
}
