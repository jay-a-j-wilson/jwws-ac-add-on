<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Collabs\Columns\Collabs\Hidden\Editing;

use AC\Helper\Select\Option;
use AC\Type\ToggleOptions;
use ACP\Editing\Service;
use ACP\Editing\View;
use ACP\Editing\View\Toggle;
use JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Collabs\Columns\Collabs\Hidden\Column\Pro\Pro;
use function __;
use function wc_get_product;

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

    /**
     * Retrieves the value for editing.
     *
     * For example: get_post_meta($id, '_my_custom_field_example', true);
     */
    public function get_value(int $id): string {
        return $this->column->get_raw_value(id: $id);
    }

    /**
     * Saves the value after using inline-edit.
     *
     * Store the value that has been entered with inline-edit.
     * For example: update_post_meta( $id, '_my_custom_field_example', $value );
     */
    public function update(int $id, mixed $data): void {
        $product = wc_get_product(the_product: $id);
        $data === ''
            ? $product->delete_meta_data(key: $this->column->meta_key())
            : $product->update_meta_data (
                key: $this->column->meta_key(),
                value: $data,
            );
        $product->save();
    }
}
