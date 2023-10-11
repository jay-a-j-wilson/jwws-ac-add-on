<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Traits\Products;

use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Traits\Products\Attributes\Attributes;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Traits\Products\Metadata\Metadata;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Traits\Products\Names\Names;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Traits\Products\Profits\Profits;

trait Products {
    use Attributes;
    use Metadata;
    use Names;
    use Profits;

    public static function of(int $id): self {
        return new self(
            product: $id,
        );
    }

    /**
     * @return void
     */
    private function __construct(int $product = 0) {
        parent::__construct($product);
    }

    public function is_not_type(string ...$types): bool {
        return ! $this->is_type(type: $types);
    }
}
