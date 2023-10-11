<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Traits\Products\Attributes;

use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product_Attribute\Product_Attribute;
use WC_Product_Attribute;

trait Attributes {
    public function wc_attribute(string $key): WC_Product_Attribute {
        return $this->get_attributes()[$key];
    }

    public function attribute(string $key): Product_Attribute {
        return Product_Attribute::of(
            attribute: $this->wc_attribute(key: $key),
        );
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

    public function update_attribute_position(
        string $attribute,
        int $position,
    ): void {
        $this->update_attribute(
            key: $attribute,
            value: $this
                ->attribute(key: $attribute)
                ->update_position(value: $position)
                ->to_wc_product_attribute(),
        );
    }

    public function update_attribute_visible(
        string $attribute,
        bool $visible,
    ): void {
        $this->update_attribute(
            key: $attribute,
            value: $this
                ->attribute(key: $attribute)
                ->update_visible(value: $visible)
                ->to_wc_product_attribute(),
        );
    }
}
