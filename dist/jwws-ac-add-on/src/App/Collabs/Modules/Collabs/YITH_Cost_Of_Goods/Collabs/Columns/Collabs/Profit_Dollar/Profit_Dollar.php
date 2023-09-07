<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Profit_Dollar;

use AC\ListScreen;
use ACA\WC\ListScreen\Product;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Column\Column;
use JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Profit_Dollar\Column\Pro\Pro;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class Profit_Dollar extends Column {
    public function register(ListScreen $list_screen): void {
        if ($list_screen instanceof Product) {
            $list_screen->register_column_type(column: new Pro());
        }
    }
}