<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Products_Wizard\Columns\Steps_Settings;

use AC\ListScreen;
use JWWS\ACA\App\{
    Common\Column\Hook,
    Modules\Products_Wizard\Columns\Steps_Settings\Column\Free\Free
};

if (! \defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class Steps_Settings {
    use Hook;

    public function register(ListScreen $list_screen): void {
        if ($list_screen->get_key() !== 'wc_product_wizard') {
            return;
        }

        $list_screen->register_column_type(column: new Free());
    }
}
