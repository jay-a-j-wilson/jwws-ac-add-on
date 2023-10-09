<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Product_Attribute;

use WC_Product;
use WC_Product_Attribute;
use WP_Term;

final class Product_Attribute extends WC_Product_Attribute {
    /**
     * @link https://kevinruscoe.medium.com/woocommerce-and-mysterious-product-attributes-fffc2014f4b2
     */
    public static function of(WP_Term $term): WC_Product_Attribute {
        $attribute = new WC_Product_Attribute();
        $attribute->set_id(value: $term->term_taxonomy_id);
        $attribute->set_name(value: $term->taxonomy);
        $attribute->set_options(value: [$term->term_id]);
        $attribute->set_visible(value: 0);
        $attribute->set_variation(value: 0);

        return $attribute;
    }
}