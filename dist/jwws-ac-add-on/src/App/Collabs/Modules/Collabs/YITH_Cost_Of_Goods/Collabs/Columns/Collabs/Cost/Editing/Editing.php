<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Cost\Editing;

use ACA\WC\Editing\Product\ProductNotSupportedReasonTrait;
use ACP\Editing\Service;
use ACP\Editing\Service\Editability;
use ACP\Editing\View;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Factory\Product_Factory;
use JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Cost\Column\Pro\Pro;

/**
 * Editing class. Adds editing functionality to the column.
 */
final class Editing implements Editability, Service {
    use ProductNotSupportedReasonTrait;

    /**
     * @return void
     */
    public function __construct(private Pro $column) {}

    public function is_editable(int $id): bool {
        return Product_Factory::of(id: $id)
            ->create()
            ->is_not_type('variable', 'grouped')
        ;
    }

    public function get_view(string $context): ?View {
        return (new View\Number())
            ->set_revisioning(enable: true)
            ->set_clear_button(enable: true)
        ;
    }

    public function get_value(int $id): mixed {
        return $this->column->get_raw_value(id: $id);
    }

    public function update(int $id, mixed $data): void {
        Product_Factory::of(id: $id)
            ->create()
            ->update_metadata(
                key: $this->column->meta_key(),
                value: $data,
            )
        ;
    }
}
