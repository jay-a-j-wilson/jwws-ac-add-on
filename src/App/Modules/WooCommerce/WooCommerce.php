<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\WooCommerce;

use JWWS\ACA\App\Modules\WooCommerce\Columns\Columns;

if (! \defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class WooCommerce {
    /**
     * Factory method.
     */
    public static function new_instance(): self {
        return new self();
    }

    /**
     * @return void
     */
    private function __construct() {}

    public function hook(): void {
        Columns::new_instance()->hook();
    }
}
