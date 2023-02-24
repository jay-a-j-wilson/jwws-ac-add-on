<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Columns\Attribute_Visibility;

use JWWS\Admin_Columns_Add_On\Modules\Columns;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Root.
 */
Class Root {
    use Columns\Hook;

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
