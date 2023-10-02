<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Group\Enums;

enum Group: string {
    case PRODUCTS_WIZARD    = 'jwws_aca-products_wizard';
    case WOOCOMMERCE        = 'woocommerce';
    case YITH_COST_OF_GOODS = 'jwws_aca-yith_cost_of_goods';
}
