<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Columns;

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