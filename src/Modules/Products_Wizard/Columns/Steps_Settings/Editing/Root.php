<?php

namespace JWWS\ACA\Modules\Products_Wizard\Columns\Steps_Settings\Editing;

use JWWS\ACA\Modules\Products_Wizard\Columns\Steps_Settings\Column;
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
        ;
    }

    /**
     * @param int $id
     */
    public function get_value(int $id): mixed {
        return $this->column->get_value(wizard_id: $id);
    }

    /**
     * Saves the value after using inline-edit.
     *
     * @param int   $id
     * @param mixed $data
     */
    public function update(int $id, mixed $data): void {
    }
}
