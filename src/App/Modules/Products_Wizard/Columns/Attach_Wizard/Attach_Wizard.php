<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Products_Wizard\Columns\Attach_Wizard;

use AC\ListScreen;
use ACA\WC\ListScreen\Product;
use JWWS\ACA\App\{
    Modules\Products_Wizard\Columns\Attach_Wizard\Column\Pro\Pro,
    Common\Column\Hook
};

if (! \defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class Attach_Wizard {
    use Hook;

    public function register(ListScreen $list_screen): void {
        if ($list_screen instanceof Product) {
            $list_screen->register_column_type(column: new Pro());
        }
    }
}
