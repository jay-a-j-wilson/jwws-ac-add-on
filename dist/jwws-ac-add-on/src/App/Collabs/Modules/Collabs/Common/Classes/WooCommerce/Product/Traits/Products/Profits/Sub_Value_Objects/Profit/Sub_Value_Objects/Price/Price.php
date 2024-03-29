<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Traits\Products\Profits\Sub_Value_Objects\Profit\Sub_Value_Objects\Price;

final class Price {
    public static function of(float $num): self {
        return new self(
            value: $num,
        );
    }

    private function __construct(private readonly float $value) {}

    public function value(): float {
        return $this->value;
    }
}
