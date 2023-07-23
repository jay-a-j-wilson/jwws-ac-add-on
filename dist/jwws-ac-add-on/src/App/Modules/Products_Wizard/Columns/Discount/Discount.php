<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Products_Wizard\Columns\Discount;

use AC\ListScreen;
use ACA\WC\ListScreen\Product;
use JWWS\ACA\App\{
    Common\Column\Column,
    Modules\Products_Wizard\Columns\Discount\Column\Free\Free
};

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class Discount extends Column {
    public function register(ListScreen $list_screen): void {
        if ($list_screen instanceof Product) {
            $list_screen->register_column_type(column: new Free());
        }
    }
}
