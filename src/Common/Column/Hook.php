<?php

namespace JWWS\ACA\Common\Column;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

trait Hook {
    /**
     * @return void
     */
    public static function hook(): void {
        add_action(
            'acp/column_types',
            [new self(), 'register'],
        );
    }
}