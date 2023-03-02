<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Columns\Discount\Editing;

use JWWS\Admin_Columns_Add_On\Modules\Columns\Discount\Column;
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
        return (new View\Text())
            ->set_clear_button(enable: true)
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
    }
}
