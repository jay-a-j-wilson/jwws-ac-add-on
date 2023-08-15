<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Attribute_Builder\Editing;

use AC\Helper\Select\Option;
use AC\Type\ToggleOptions;
use ACP\Editing\Service;
use ACP\Editing\View;
use ACP\Editing\View\Toggle;
use JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Attribute_Builder\Column\Pro\Pro;
use JWWS\ACA\Deps\JWWS\WPPF\Logger\Error_Logger\Error_Logger;
use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Meta\Subclasses\Post_Meta\Post_Meta;
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
            ->set_revisioning(enable: false)
            ->set_clear_button(enable: false)
        ;
    }

    public function get_value(int $product_id): mixed {
        return $this->column->get_raw_value(product_id: $product_id);
    }

    /**
     * Saves the value after using inline-edit.
     */
    public function update(int $id, mixed $data): void {
        $attr = $this->column->get_option(key: 'product_taxonomy_display');

        $attrs = Post_Meta::of(id: $id)
            ->find_by_key(key: '_product_attributes')
        ;

        if (empty($data)) {
            unset($attrs[$attr]);
        } else {
            $terms = get_terms(args: [
                'taxonomy'   => $attr,
                'hide_empty' => false,
            ]);

            foreach ($terms as $term) {
                if ($term->name === $data) {
                    wp_set_object_terms(
                        object_id: $id,
                        terms: [$term->term_id],
                        taxonomy: $term->taxonomy,
                    );

                    $attrs[$attr] = [
                        'name'          => $attr,
                        'value'         => '',
                        'position'      => $attrs[$attr]['position']     ?? 0,
                        'is_visible'    => $attrs[$attr]['is_visible']   ?? 0,
                        'is_variation'  => $attrs[$attr]['is_variation'] ?? 0,
                        'is_taxonomy'   => $attrs[$attr]['is_taxonomy']  ?? 1,
                    ];

                    break;
                }
            }
        }

        update_post_meta(
            post_id: $id,
            meta_key: '_product_attributes',
            meta_value: $attrs,
        );
    }
}
