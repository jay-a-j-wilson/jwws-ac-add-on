<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Products_Wizard\Columns;

use JWWS\ACA\App\Modules\Products_Wizard\Columns\{
    Attach_Wizard\Attach_Wizard,
    Discount\Discount,
    Steps_Settings\Steps_Settings
};

if (! \defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class Columns {
    public static function hook(): void {
        Attach_Wizard::hook();
        Discount::hook();
        Steps_Settings::hook();
    }
}
