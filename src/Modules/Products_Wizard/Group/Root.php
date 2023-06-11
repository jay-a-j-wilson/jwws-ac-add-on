<?php

namespace JWWS\ACA\Modules\Products_Wizard\Group;

use JWWS\ACA\Common\Group;

class Root {
    use Group\Hook;

    /**
     * @param \AC\Groups $groups
     */
    public function register(\AC\Groups $groups): void {
        $groups->register_group(
            slug: 'jwws-products_wizard',
            label: __(text: 'Products Wizard (Custom)', domain: 'jwws'),
            priority: 25,
        );
    }
}
