<?php

namespace JWWS\ACA\Modules\Products_Wizard\Columns;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Root.
 */
Class Root {
    /**
     * @return void
     */
    public static function hook(): void {
        Attach_Wizard\Root::hook();
        Discount\Root::hook();
        Steps_Settings\Root::hook();
    }
}
