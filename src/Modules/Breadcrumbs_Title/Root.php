<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Breadcrumbs_Title;

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
        Column\Pro\Root::hook();
    }
}
