<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Collabs\Columns\Collabs\Default_Cart_Content;

use AC\ListScreen;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Column\Column;
use JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Collabs\Columns\Collabs\Default_Cart_Content\Column\Free\Free;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class Default_Cart_Content extends Column {
    public function register(ListScreen $list_screen): void {
        if ($list_screen->get_key() !== 'wc_product_wizard') {
            return;
        }

        $list_screen->register_column_type(column: new Free());
    }
}
