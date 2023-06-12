<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Products_Wizard\Group;

use AC\Groups;
use JWWS\ACA\App\Common\Group\Hook;

final class Group {
    use Hook;

    public function register(Groups $groups): void {
        $groups->register_group(
            slug: 'jwws-products_wizard',
            label: __(text: 'Products Wizard (Custom)', domain: 'jwws'),
            priority: 25,
        );
    }
}
