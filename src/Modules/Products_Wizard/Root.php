<?php

namespace JWWS\ACA\Modules\Products_Wizard;

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
        Columns\Root::hook();
        Group\Root::hook();
    }
}
