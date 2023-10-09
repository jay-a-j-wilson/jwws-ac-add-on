<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Product_Variable;

use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Traits\Profits\Profits;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Traits\Profits\Sub_Value_Objects\Profit\Profit;
use WC_Product_Variable;
use WC_Product_Attribute;

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

    public function attribute(string $key): WC_Product_Attribute {
        return $this->get_attributes()[$key];
    }

    public function has_attribute(string $key): bool {
        return array_key_exists(
            key: $key,
            array: $this->get_attributes(),
        );
    }

    public function delete_attribute(string $key): void {
        if (! $this->has_attribute(key: $key)) {
            return;
        }

        $attributes = $this->get_attributes();

        // Remove the attribute by name
        unset($attributes[$key]);

        $this->set_attributes(raw_attributes: $attributes);
        $this->save();
    }

    public function update_attribute(
        string $key,
        WC_Product_Attribute $value,
    ): void {
        $this->set_attributes(
            raw_attributes: array_merge(
                $this->get_attributes(),
                [
                    $key => $value,
                ],
            ),
        );

        $this->save();
    }
}
