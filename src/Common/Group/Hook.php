<?php

namespace JWWS\ACA\Common\Group;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * 
 */
trait Hook {
    /**
     * @return void
     */
    public static function hook(): void {
        add_action(
            'ac/column_groups',
            [new self(), 'register'],
        );
    }
}