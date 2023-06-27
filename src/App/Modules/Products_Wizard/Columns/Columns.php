<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Products_Wizard\Columns;

use JWWS\ACA\App\Modules\Products_Wizard\Columns\{
    Attach_Wizard\Attach_Wizard,
    Discount\Discount,
    Steps_Settings\Steps_Settings
};

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class Columns {
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
        Attach_Wizard::new_instance()->hook();
        Discount::new_instance()->hook();
        Steps_Settings::new_instance()->hook();
    }
}