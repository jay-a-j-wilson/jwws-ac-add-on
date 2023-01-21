<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Groups\Yoast_SEO;

use JWWS\Admin_Columns_Add_On\Modules\Groups;

class Root {
    use Groups\Hook;

    /**
     * @param AC\Groups $groups
     */
    public function register(\AC\Groups $groups): void {
        $groups->register_group(
            slug: 'jwws-wpseo',
            label: __('Yoast SEO (JWWS)', 'jwws'),
            priority: 25,
        );
    }
}
