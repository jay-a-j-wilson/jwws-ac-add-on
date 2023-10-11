<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Attribute_Builder\Editing;

use AC\Helper\Select\Option;
use AC\Type\ToggleOptions;
use ACA\WC\Editing\Product\ProductNotSupportedReasonTrait;
use ACP\Editing\Service;
use ACP\Editing\Service\Editability;
use ACP\Editing\View;
use ACP\Editing\View\Toggle;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Factory\Product_Factory;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\WC_Product_Attribute_Factory\WC_Product_Attribute_Factory;
use JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Attribute_Builder\Column\Pro\Pro;
use function __;

/**
 * Editing class. Adds editing functionality to the column.
 */
final class Editing implements Editability, Service {
    use ProductNotSupportedReasonTrait;

    private readonly string $negative_toggle_option;

    /**
     * @return void
     */
    public function __construct(private Pro $column) {
        $this->negative_toggle_option = '';
    }

    /**
     * Disables edit controls under certain conditions.
     *
     * Condition: Attribute is not selected in column settings.
     */
    public function is_editable(int $id): bool {
        return $this->column->attribute_name() !== '';
    }

    public function get_view(string $context): ?View {
        return (new Toggle(
            options: new ToggleOptions(
                disabled: new Option(
                    value: $this->negative_toggle_option,
                    label: __(text: 'No'),
                ),
                enabled: new Option(
                    value: 'Yes',
                    label: __(text: 'Yes'),
                ),
            ),
        ))
            ->set_revisioning(enable: false)
            ->set_clear_button(enable: false)
        ;
    }

    public function get_value(int $id): mixed {
        return $this->column->get_raw_value(id: $id);
    }

    /**
     * Saves the value after using inline-edit.
     */
    public function update(int $id, mixed $data): void {
        $product = Product_Factory::of(id: $id)->create();

        $this->is_toggle_option_negative(data: $data)
            ? $product->delete_attribute(key: $this->column->attribute_name())
            : $product->update_attribute(
                key: $this->column->attribute_name(),
                value: WC_Product_Attribute_Factory::of(
                    term: get_term_by(
                        field: 'name',
                        value: 'Yes',
                        taxonomy: $this->column->attribute_name(),
                    ),
                )
                    ->create(),
            );
    }

    private function is_toggle_option_negative(mixed $data): bool {
        return $data === $this->negative_toggle_option;
    }
}
