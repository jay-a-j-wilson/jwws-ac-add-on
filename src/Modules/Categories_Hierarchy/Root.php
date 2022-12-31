<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Categories_Hierarchy;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Root.
 */
Class Root {
    /**
     * @return void
     */
    public static function hook(): void {
        Column\Free\Root::hook();
    }
}
