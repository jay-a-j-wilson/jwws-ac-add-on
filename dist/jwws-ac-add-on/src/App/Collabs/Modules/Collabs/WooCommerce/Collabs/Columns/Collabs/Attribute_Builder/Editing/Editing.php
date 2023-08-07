<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Attribute_Builder\Editing;

use AC\Helper\Select\Option;
use AC\Type\ToggleOptions;
use ACP\Editing\Service;
use ACP\Editing\View;
use ACP\Editing\View\Toggle;
use JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Attribute_Builder\Column\Pro\Pro;
use function __;
use function get_terms;
use function wp_set_object_terms;

/**
 * Editing class. Adds editing functionality to the column.
 */
final class Editing implements Service {
    /**
     * @return void
     */
    public function __construct(private Pro $column) {}

    public function get_view(string $context): ?View {
        // Disables edit controls if attribute is not selected in column
        // settings.
        if (empty($this->column->get_option(key: 'product_taxonomy_display'))) {
            return null;
        }

        return (new Toggle(
            options: new ToggleOptions(
                disabled: new Option(
                    value: 'No',
                    label: __(text: 'No'),
                ),
                enabled: new Option(
                    value: 'Yes',
                    label: __(text: 'Yes'),
                ),
            ),
        ))
            ->set_clear_button(enable: true)
        ;
    }

    public function get_value(int $product_id): mixed {
        return $this->column->get_raw_value(product_id: $product_id);
    }

    /**
     * Saves the value after using inline-edit.
     */
    public function update(int $id, mixed $data): void {
        $attribute = $this->column->get_option(key: 'product_taxonomy_display');

        foreach (get_terms(args: $attribute) as $term) {
            if ($term->name === $data) {
                wp_set_object_terms(
                    object_id: $id,
                    terms: $term->term_id,
                    taxonomy: $term->taxonomy,
                );

                return;
            }
        }

        wp_set_object_terms(
            object_id: $id,
            terms: [],
            taxonomy: $attribute,
        );
    }
}
