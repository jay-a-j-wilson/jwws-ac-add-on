<?php declare(strict_types=1);

namespace JWWS\ACA\App\Common\Enums;

enum Plugin_Basename: string {
    case ADMIN_COLUMNS_PRO  = 'admin-columns-pro/admin-columns-pro.php';
    case WOOCOMMERCE        = 'woocommerce/woocommerce.php';
    case PRODUCTS_WIZARD    = 'woocommerce-products-wizard/woocommerce-products-wizard.php';
    case YITH_COST_OF_GOODS = 'yith-cost-of-goods-for-woocommerce-premium/init.php';
}
