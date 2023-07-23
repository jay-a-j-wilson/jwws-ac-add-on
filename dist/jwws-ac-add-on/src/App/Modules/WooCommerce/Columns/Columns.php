<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\WooCommerce\Columns;

use JWWS\ACA\App\Modules\WooCommerce\Columns\{
    Attribute_Position\Attribute_Position,
    Attribute_Visibility\Attribute_Visibility,
    Categories_Hierarchy\Categories_Hierarchy,
    Display_Type\Display_Type
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
        Attribute_Position::new_instance()->hook();
        Attribute_Visibility::new_instance()->hook();
        Categories_Hierarchy::new_instance()->hook();
        Display_Type::new_instance()->hook();
    }
}
