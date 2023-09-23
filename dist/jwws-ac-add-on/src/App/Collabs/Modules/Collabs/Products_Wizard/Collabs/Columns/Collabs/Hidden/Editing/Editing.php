<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Collabs\Columns\Collabs\Hidden\Editing;

use AC\Helper\Select\Option;
use AC\Type\ToggleOptions;
use ACP\Editing\Service;
use ACP\Editing\View;
use ACP\Editing\View\Toggle;
use JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Collabs\Columns\Collabs\Hidden\Column\Pro\Pro;
use function __;
use function update_post_meta;

/**
 * Editing class. Adds editing functionality to the column.
 */
final class Editing implements Service {
    /**
     * @return void
     */
    public function __construct(private Pro $column) {}

    public function get_view(string $context): ?View {
        return (new Toggle(
            options: new ToggleOptions(
                disabled: new Option(
                    value: '',
                    label: __(text: 'No'),
                ),
                enabled: new Option(
                    value: 'yes',
                    label: __(text: 'Yes'),
                ),
            ),
        ))
            ->set_revisioning(enable: false)
            ->set_clear_button(enable: false)
        ;
    }

    public function get_value(int $id): mixed {
        return $this->column->get_value(id: $id);
    }

    /**
     * Saves the value after using inline-edit.
     */
    public function update(int $id, mixed $data): void {
        update_post_meta(
            post_id: $id,
            meta_key: '_is_hidden_product',
            meta_value: $data,
        );
    }
}
