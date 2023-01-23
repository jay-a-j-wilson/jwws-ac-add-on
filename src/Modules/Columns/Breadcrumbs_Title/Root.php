<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Columns\Breadcrumbs_Title;

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
        add_action(
            'acp/column_types',
            [new self(), 'register'],
        );
    }

    /**
     * @param \AC\ListScreen $list_screen
     *
     * @return void
     */
    public function register(\AC\ListScreen $list_screen): void {
        $screens = [
            'wp-taxonomy_product_cat',
        ];

        if (in_array(needle: $list_screen->get_key(), haystack: $screens)) {
            $list_screen->register_column_type(column: new Column\Free\Root());
        }
    }
}
