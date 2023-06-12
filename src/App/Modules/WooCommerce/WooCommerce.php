<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\WooCommerce;

use JWWS\ACA\App\Modules\WooCommerce\Columns\Columns;

if (! \defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class WooCommerce {
    public static function hook(): void {
        Columns::hook();
    }
}
