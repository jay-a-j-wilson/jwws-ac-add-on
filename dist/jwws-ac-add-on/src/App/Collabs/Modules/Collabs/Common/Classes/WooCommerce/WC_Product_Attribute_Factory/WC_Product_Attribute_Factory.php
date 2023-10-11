<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\WC_Product_Attribute_Factory;

use WC_Product_Attribute;
use WP_Term;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class WC_Product_Attribute_Factory {
    /**
     * @link https://kevinruscoe.medium.com/woocommerce-and-mysterious-product-attributes-fffc2014f4b2
     */
    public static function of(WP_Term $term): self {
        return new self(
            term: $term,
        );
    }

    /**
     * @return void
     */
    private function __construct(private readonly WP_Term $term) {}

    public function create() {
        $attribute = new WC_Product_Attribute();
        $attribute->set_id(value: $this->term->term_taxonomy_id);
        $attribute->set_name(value: $this->term->taxonomy);
        $attribute->set_options(value: [$this->term->term_id]);
        $attribute->set_position(value: 0);
        $attribute->set_visible(value: false);
        $attribute->set_variation(value: false);

        return $attribute;
    }
}
