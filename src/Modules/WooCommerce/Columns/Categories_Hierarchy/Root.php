<?php

namespace JWWS\ACA\Modules\WooCommerce\Columns\Categories_Hierarchy;

use JWWS\ACA\Common;

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
        if ($list_screen instanceof \ACA\WC\ListScreen\Product) {
            $list_screen->register_column_type(column: new Column\Pro\Root());
        }
    }
}
