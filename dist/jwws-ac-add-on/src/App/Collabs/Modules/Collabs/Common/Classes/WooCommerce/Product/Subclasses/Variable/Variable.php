<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Subclasses\Variable;

use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Product;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Traits\Products\Products;
use WC_Product_Variable;

final class Variable extends WC_Product_Variable implements Product  {
    use Products;
}
