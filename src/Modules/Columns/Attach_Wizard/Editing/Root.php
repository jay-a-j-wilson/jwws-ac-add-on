<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Columns\Attach_Wizard\Editing;

use JWWS\Admin_Columns_Add_On\Modules\Columns\Attach_Wizard\Column;
use ACP\Editing\ {
    Service,
    View
};
use function JWWS\WP_Plugin_Framework\Functions\Debug\console_log;

/**
 * Editing class. Adds editing functionality to the column.
 */
class Root implements Service {
    /**
     * @param Column\Pro\Root $column
     */
    public function __construct(private Column\Pro\Root $column) {
    }

    /**
     * @param string $context
     */
    public function get_view(string $context): ?View {
        $wizards = get_posts(
            args: [
                'post_type'   => 'wc_product_wizard',
                'post_status' => 'publish',
                'numberposts' => -1,
                'orderby'     => 'menu_order',
                'order'       => 'ASC',
            ],
        );

        $options = [];

        foreach ($wizards as $wizard) {
            $options[$wizard->ID] = __(text: $wizard->post_title, domain: 'jwws');
        }

        return (new View\Select())
            ->set_clear_button(enable: true)
            ->set_options(options: $options)
        ;
    }

    /**
     * @param int $product_id
     */
    public function get_value(int $product_id): mixed {
        return $this->column->get_value(product_id: $product_id);
    }

    /**
     * Saves the value after using inline-edit.
     *
     * @param int   $product_id
     * @param mixed $data
     */
    public function update(int $product_id, mixed $data): void {
        update_post_meta(
            post_id: $product_id,
            meta_key: '_wcpw_attach_wizard',
            meta_value: $data,
        );
    }
}
