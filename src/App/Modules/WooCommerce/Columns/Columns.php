<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\WooCommerce\Columns;

use JWWS\ACA\App\Modules\WooCommerce\Columns\{
    Attribute_Position\Attribute_Position,
    Attribute_Visibility\Attribute_Visibility,
    Categories_Hierarchy\Categories_Hierarchy,
    Display_Type\Display_Type
};

if (! \defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class Columns {
    public static function hook(): void {
        Attribute_Position::hook();
        Attribute_Visibility::hook();
        Categories_Hierarchy::hook();
        Display_Type::hook();
    }
}
