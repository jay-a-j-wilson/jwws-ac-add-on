<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Display_Type\Editing;

use ACP\Editing\Service;
use ACP\Editing\View;
use ACP\Editing\View\Select;
use JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Display_Type\Column\Pro\Pro;
use function __;
use function update_term_meta;

/**
 * Editing class. Adds editing functionality to the column.
 */
final class Editing implements Service {
    public function __construct(private Pro $column) {}

    public function get_view(string $context): ?View {
        return (new Select())
            ->set_clear_button(enable: true)
            ->set_options(
                options: [
                    ''              => __(text: 'Standard', domain: 'jwws'),
                    'products'      => __(text: 'Products', domain: 'jwws'),
                    'subcategories' => __(text: 'Subcategories', domain: 'jwws'),
                    'both'          => __(text: 'Both', domain: 'jwws'),
                ],
            )
        ;
    }

    public function get_value(int $id): mixed {
        return $this->column->get_value(id: $id);
    }

    /**
     * Saves the value after using inline-edit.
     */
    public function update(int $id, mixed $data): void {
        update_term_meta(
            term_id: $id,
            meta_key: 'display_type',
            meta_value: $data,
        );
    }
}
