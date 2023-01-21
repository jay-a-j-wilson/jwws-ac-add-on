<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Groups\WooCommerce;

use JWWS\Admin_Columns_Add_On\Modules\Groups;

class Root {
    use Groups\Hook;

    /**
     * @param AC\Groups $groups
     */
    public function register(\AC\Groups $groups): void {
        $groups->register_group(
            slug: 'jwws-woocommerce',
            label: __('WooCommerce (JWWS)', 'jwws'),
            priority: 25,
        );
    }
}
