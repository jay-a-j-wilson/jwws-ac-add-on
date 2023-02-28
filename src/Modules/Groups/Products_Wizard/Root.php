<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Groups\Products_Wizard;

use JWWS\Admin_Columns_Add_On\Modules\Groups;

class Root {
    use Groups\Hook;

    /**
     * @param AC\Groups $groups
     */
    public function register(\AC\Groups $groups): void {
        $groups->register_group(
            slug: 'jwws-products_wizard',
            label: __(text: 'Products Wizard (JWWS)', domain: 'jwws'),
            priority: 25,
        );
    }
}
