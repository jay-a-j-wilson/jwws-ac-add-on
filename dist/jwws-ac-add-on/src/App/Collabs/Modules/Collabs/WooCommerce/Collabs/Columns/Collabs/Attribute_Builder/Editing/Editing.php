<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Attribute_Builder\Editing;

use AC\Helper\Select\Option;
use AC\Type\ToggleOptions;
use ACA\WC\Editing\Product\ProductNotSupportedReasonTrait;
use ACP\Editing\Service;
use ACP\Editing\Service\Editability;
use ACP\Editing\View;
use ACP\Editing\View\Toggle;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Product\Product;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Product_Variable\Product_Variable;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Product_Attribute\Product_Attribute;
use JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Attribute_Builder\Column\Pro\Pro;
use function __;

/**
 * Editing class. Adds editing functionality to the column.
 */
final class Editing implements Editability, Service {
    use ProductNotSupportedReasonTrait;

    /**
     * @return void
     */
    public function __construct(private Pro $column) {}

    /**
     * Disables edit controls under certain conditions.
     */
    public function is_editable(int $id): bool {
        // condition: attribute is not selected in column settings.
        return $this->column->attribute_name() !== '';
    }

    public function get_view(string $context): ?View {
        return (new Toggle(
            options: new ToggleOptions(
                disabled: new Option(
                    value: '',
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
        $product = wc_get_product(the_product: $id)->is_type(type: 'variable')
            ? Product_Variable::of(id: $id)
            : Product::of(id: $id);

        $data === ''
            ? $product->delete_attribute(key: $this->column->attribute_name())
            : $product->update_attribute(
                key: $this->column->attribute_name(),
                value: Product_Attribute::of(
                    term: get_term_by(
                        field: 'name',
                        value: 'Yes',
                        taxonomy: $this->column->attribute_name(),
                    ),
                ),
            );
    }
}
