<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Traits\Products\Names;

trait Names {
    /**
     * Returns the products variation name.
     *
     * Example: 'Product Name - Variation' will return 'Variation'.
     * Returns blank ('') if not a variation product.
     */
    public function variation_name(): string {
        if ($this->get_type() !== 'variation') {
            return '';
        }

        $last_hyphen_position = strrpos(
            haystack: $this->get_name(),
            needle: '-',
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
