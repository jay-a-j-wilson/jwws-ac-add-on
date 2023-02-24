<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Columns\Attach_Wizard\Editing;

use JWWS\Admin_Columns_Add_On\Modules\Columns\Attach_Wizard\Column;
use ACP\Editing\ {
    Service,
    View
};

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
        return (new View\Select())
            ->set_clear_button(enable: true)
            ->set_options(
                options: [
                    ''              => __(text: 'Standard', domain: 'jwws'),
                    'products'      => __(text: 'Products', domain: 'jwws'),
                    'subcategories' => __(text: 'Subcategories', domain: 'jwws'),
                    'both'          => __(text: 'Both', domain: 'jwws'),
                ],
            )
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
        update_term_meta(
            term_id: $product_id,
            meta_key: 'display_type',
            meta_value: $data,
        );
    }
}
