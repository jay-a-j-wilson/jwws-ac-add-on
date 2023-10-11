<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product_Attribute;

use WC_Product_Attribute;

final class Product_Attribute extends WC_Product_Attribute {
    public static function of(WC_Product_Attribute $attribute): self {
        return new self(
            data: [
                'id'        => $attribute->get_id(),
                'name'      => $attribute->get_name(),
                'options'   => $attribute->get_options(),
                'position'  => $attribute->get_position(),
                'visible'   => $attribute->get_visible(),
                'variation' => $attribute->get_variation(),
            ],
        );
    }

    /**
     * @return void
     */
    private function __construct(protected $data) {}

    public function update_id(int $value): self {
        $this->set_id(value: $value);

        return $this;
    }

    public function update_name(string $value): self {
        $this->set_visible(value: $value);

        return $this;
    }

    public function update_options(array $value): self {
        $this->set_options(value: $value);

        return $this;
    }

    public function update_position(int $value): self {
        $this->set_position(value: $value);

        return $this;
    }

    public function update_visible(bool $value): self {
        $this->set_visible(value: $value);

        return $this;
    }

    public function update_variation(bool $value): self {
        $this->set_variation(value: $value);

        return $this;
    }

    /**
     * Converts object to native WooCommerce object type WC_Product_Attribute.
     */
    public function to_wc_product_attribute(): WC_Product_Attribute {
        $attribute = new WC_Product_Attribute();
        $attribute->set_id(value: $this->get_id());
        $attribute->set_name(value: $this->get_name());
        $attribute->set_options(value: $this->get_options());
        $attribute->set_position(value: $this->get_position());
        $attribute->set_visible(value: $this->get_visible());
        $attribute->set_variation(value: $this->get_variation());

        return $attribute;
    }
}
