<?php

namespace JWWS\ACA\Modules\Groups\Yoast_SEO;

use JWWS\ACA\Modules\Groups;

class Root {
    use Groups\Hook;

    /**
     * @param AC\Groups $groups
     */
    public function register(\AC\Groups $groups): void {
        $groups->register_group(
            slug: 'jwws-wpseo',
            label: __(text: 'Yoast SEO (JWWS)', domain: 'jwws'),
            priority: 25,
        );
    }
}
