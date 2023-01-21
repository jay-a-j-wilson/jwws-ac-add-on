<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Groups;

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
        WooCommerce\Root::hook();
        Yoast_SEO\Root::hook();
    }
}
