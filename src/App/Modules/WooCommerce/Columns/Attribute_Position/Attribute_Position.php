<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\WooCommerce\Columns\Attribute_Position;

use AC\ListScreen;
use ACA\WC\ListScreen\Product;
use JWWS\ACA\App\{
    Common\Column\Column,
    Modules\WooCommerce\Columns\Attribute_Position\Column\Pro\Pro
};

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class Attribute_Position extends Column {
    public function register(ListScreen $list_screen): void {
        if ($list_screen instanceof Product) {
            $list_screen->register_column_type(column: new Pro());
        }
    }
}
