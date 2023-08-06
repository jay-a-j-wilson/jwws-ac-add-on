<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Collaborators\Products_Wizard\Collaborators\Columns\Collaborators\Default_Cart_Content\Editing;

use ACP\Editing\Service;
use ACP\Editing\View;
use ACP\Editing\View\Select;
use JWWS\ACA\App\Modules\Collaborators\Products_Wizard\Collaborators\Columns\Collaborators\Default_Cart_Content\Column\Pro\Pro;

/**
 * Editing class. Adds editing functionality to the column.
 */
final class Editing implements Service {
    public function __construct(private Pro $column) {}

    public function get_view(string $context): ?View {
        return (new Select())
            ->set_clear_button(enable: true)
        ;
    }

    public function get_value(int $id): mixed {
        return $this->column->get_value(wizard_id: $id);
    }

    /**
     * Saves the value after using inline-edit.
     */
    public function update(int $id, mixed $data): void {}
}
