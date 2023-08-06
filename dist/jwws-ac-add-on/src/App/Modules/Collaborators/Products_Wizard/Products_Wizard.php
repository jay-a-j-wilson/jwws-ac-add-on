<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Collaborators\Products_Wizard;

use JWWS\ACA\App\Modules\Collaborators\Products_Wizard\{Collaborators\Group\Group};
use JWWS\ACA\App\Modules\Collaborators\Products_Wizard\Collaborators\Columns\Columns;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class Products_Wizard {
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
        Group::new_instance()->hook();
    }
}