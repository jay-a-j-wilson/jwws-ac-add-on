<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Group;

use AC\Groups;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Group\Group as Base_Group;
use function __;

final class Group extends Base_Group {
    public function register(Groups $groups): void {
        $groups->register_group(
            slug: 'jwws_aca-yith_cost_of_goods',
            label: __(text: 'YITH Cost of Goods [Custom]', domain: 'jwws'),
            priority: 25,
        );
    }
}
