<?php

namespace JWWS\ACA\Modules\Groups\WooCommerce;

use JWWS\ACA\Modules\Groups;

class Root {
    use Groups\Hook;

    /**
     * @param AC\Groups $groups
     */
    public function register(\AC\Groups $groups): void {
        $groups->register_group(
            slug: 'jwws-woocommerce',
            label: __(text: 'WooCommerce (JWWS)', domain: 'jwws'),
            priority: 25,
        );
    }
}
