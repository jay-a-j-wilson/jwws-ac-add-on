<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Products_Wizard;

use JWWS\ACA\App\Modules\Products_Wizard\{
    Columns\Columns,
    Group\Group
};

if (! \defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class Products_Wizard {
    public static function hook(): void {
        Columns::hook();
        Group::hook();
    }
}
