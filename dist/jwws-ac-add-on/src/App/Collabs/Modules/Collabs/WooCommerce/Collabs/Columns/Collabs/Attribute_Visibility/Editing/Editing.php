<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Attribute_Visibility\Editing;

use AC\Helper\Select\Option;
use AC\Type\ToggleOptions;
use ACA\WC\Editing\Product\ProductNotSupportedReasonTrait;
use ACP\Editing\Service;
use ACP\Editing\Service\Editability;
use ACP\Editing\View;
use ACP\Editing\View\Toggle;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Factory\Product_Factory;
use JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Attribute_Visibility\Column\Pro\Pro;
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
                    value: false,
                    label: __(text: 'No'),
                ),
                enabled: new Option(
                    value: true,
                    label: __(text: 'Yes'),
                ),
            ),
        ))
            ->set_revisioning(enable: false)
        ;
    }

    public function get_value(int $id): mixed {
        return $this->column->get_raw_value(id: $id);
    }

    /**
     * Saves the value after using inline-edit.
     */
    public function update(int $id, mixed $data): void {
        Product_Factory::of(id: $id)
            ->create()
            ->update_attribute_visible(
                attribute: $this->column->attribute_name(),
                visible: (bool) $data,
            )
        ;
    }
}
