<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Columns\Attribute_Position;

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
        $screens = [
            'product',
        ];

        if (in_array(needle: $list_screen->get_key(), haystack: $screens)) {
            $list_screen->register_column_type(column: new Column\Pro\Root());
        }
    }
}
