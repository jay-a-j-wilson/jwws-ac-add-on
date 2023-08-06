<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Collaborators\Products_Wizard\Collaborators\Group;

use AC\Groups;
use JWWS\ACA\App\Modules\Collaborators\Common\Group\Group as Base_Group;
use function JWWS\ACA\App\Modules\Products_Wizard\Group\__;

final class Group extends Base_Group {
    public function register(Groups $groups): void {
        $groups->register_group(
            slug: 'jwws_aca-products_wizard',
            label: __(text: 'Products Wizard (Custom)', domain: 'jwws'),
            priority: 25,
        );
    }
}
