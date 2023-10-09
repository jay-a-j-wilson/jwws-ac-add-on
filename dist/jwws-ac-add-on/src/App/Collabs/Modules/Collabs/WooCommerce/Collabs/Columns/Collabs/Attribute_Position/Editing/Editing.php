<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Attribute_Position\Editing;

use ACA\WC\Editing\Product\ProductNotSupportedReasonTrait;
use ACP\Editing\Service;
use ACP\Editing\Service\Editability;
use ACP\Editing\View;
use ACP\Editing\View\Number;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Product\Product;
use JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Attribute_Position\Column\Pro\Pro;
use JWWS\ACA\Deps\JWWS\WPPF\Logger\Error_Logger\Error_Logger;

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
        return (new Number())
            ->set_min(min: 0)
        ;
    }

    public function get_value(int $id): mixed {
        return $this->column->get_raw_value(id: $id);
    }

    /**
     * Saves the value after using inline-edit.
     */
    public function update(int $id, mixed $data): void {
        if ($this->column->attribute_name() === '') {
            return;
        }

        $product = Product::of(id: $id);
        $product->set_attributes(
            raw_attributes: array_merge(
                $product->get_attributes(),
                [
                    $product
                        ->attribute(key: $this->column->attribute_name())
                        ->set_position(value: $data),
                ],
            ),
        );
        $product->save();
    }
}
