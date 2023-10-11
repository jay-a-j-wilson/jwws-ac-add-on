<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Factory;

use InvalidArgumentException;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Subclasses\Simple\Simple;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Subclasses\Variable\Variable;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Subclasses\Variation\Variation;
use WC_Product;
use function wc_get_product;

final class Product_Factory {
    public static function of(int $id): self {
        return new self(
            wc_get_product(the_product: $id),
        );
    }

    private function __construct(private readonly WC_Product $product) {}

    /**
     * @throws InvalidArgumentException
     */
    public function create(): Simple|Variable|Variation {
        return match ($this->product->get_type()) {
            'simple'    => Simple::of(id: $this->product->get_id()),
            'variable'  => Variable::of(id: $this->product->get_id()),
            'variation' => Variation::of(id: $this->product->get_id()),
            default     => throw new InvalidArgumentException(
                message: 'ID belongs to unsupported Product type.',
            ),
        };
    }
}
