<?php

namespace JWWS\ACA\Modules\Products_Wizard\Columns\Steps_Settings;

use JWWS\ACA\Common;
use JWWS\ACA\Deps\JWWS\WPPF\Log\Error_Log;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Root.
 */
Class Root {
    use Common\Column\Hook;

    /**
     * @param \AC\ListScreen $list_screen
     *
     * @return void
     */
    public function register(\AC\ListScreen $list_screen): void {
        if ($list_screen->get_key() !== 'wc_product_wizard') {
            return;
        }

        $list_screen->register_column_type(column: new Column\Free\Root());
    }
}
