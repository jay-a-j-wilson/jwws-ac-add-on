<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Collabs\Columns\Collabs\Hidden\Editing;

use AC\Helper\Select\Option;
use AC\Type\ToggleOptions;
use ACP\Editing\Service;
use ACP\Editing\View;
use ACP\Editing\View\Toggle;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Factory\Product_Factory;
use JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Collabs\Columns\Collabs\Hidden\Column\Pro\Pro;
use function __;

/**
 * Editing class. Adds editing functionality to the column.
 */
final class Editing implements Service {
    private readonly string $negative_toggle_option;

    /**
     * @return void
     */
    public function __construct(private Pro $column) {
        $this->negative_toggle_option = '';
    }

    public function get_view(string $context): ?View {
        return (new Toggle(
            options: new ToggleOptions(
                disabled: new Option(
                    value: $this->negative_toggle_option,
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
        $product = Product_Factory::of(id: $id)->create();

        $this->is_toggle_option_negative(data: $data)
            ? $product->delete_metadata(key: $this->column->meta_key())
            : $product->update_metadata(
                key: $this->column->meta_key(),
                value: $data,
            );
    }

    private function is_toggle_option_negative(mixed $data): bool {
        return $data === $this->negative_toggle_option;
    }
}
