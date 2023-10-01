<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Cost\Editing;

use ACA\WC\Editing\Product\ProductNotSupportedReasonTrait;
use ACP\Editing\Service;
use ACP\Editing\Service\Editability;
use ACP\Editing\View;
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
        $product = wc_get_product(the_product: $id);

        return ! $product->is_type(type: ['variable', 'grouped']);
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
        update_post_meta(
            post_id: $id,
            meta_key: 'yith_cog_cost',
            meta_value: $data,
        );
    }
}
