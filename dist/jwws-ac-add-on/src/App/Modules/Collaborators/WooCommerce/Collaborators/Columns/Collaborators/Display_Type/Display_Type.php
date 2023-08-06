<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Collaborators\WooCommerce\Collaborators\Columns\Collaborators\Display_Type;

use AC\ListScreen;
use ACA\WC\ListScreen\ProductCategory;
use JWWS\ACA\App\Modules\Collaborators\Common\Column\Column;
use JWWS\ACA\App\Modules\Collaborators\WooCommerce\Collaborators\Columns\Collaborators\Display_Type\Column\Pro\Pro;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class Display_Type extends Column {
    public function register(ListScreen $list_screen): void {
        if ($list_screen instanceof ProductCategory) {
            $list_screen->register_column_type(column: new Pro());
        }
    }
}
