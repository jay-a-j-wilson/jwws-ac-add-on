<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Attribute_Visibility\Editing;

use ACP\Editing\Service;
use ACP\Editing\View;
use JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Attribute_Visibility\Column\Pro\Pro;
use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Meta\Subclasses\Post_Meta\Post_Meta;
use function JWWS\ACA\App\Modules\WooCommerce\Columns\Attribute_Visibility\Editing\__;
use function JWWS\ACA\App\Modules\WooCommerce\Columns\Attribute_Visibility\Editing\update_post_meta;

/**
 * Editing class. Adds editing functionality to the column.
 */
final class Editing implements Service {
    /**
     * @return void
     */
    public function __construct(private Pro $column) {}

    public function get_view(string $context): ?View {
        // Disables edit controls if attribute is not selected in column settings.
        if (empty($this->column->get_option(key: 'product_taxonomy_display'))) {
            return null;
        }

        return (new View\Select())
            ->set_clear_button(enable: true)
            ->set_options(options: [
                true  => __(text: 'Yes', domain: 'jwws'),
                false => __(text: 'No', domain: 'jwws'),
            ])
        ;
    }

    public function get_value(int $product_id): mixed {
        return $this->column->get_value(product_id: $product_id);
    }

    /**
     * Saves the value after using inline-edit.
     */
    public function update(int $id, mixed $data): void {
        $attributes = Post_Meta::of(id: $id)
            ->find_by_key(key: '_product_attributes')
        ;

        $option = $this->column->get_option(key: 'product_taxonomy_display');

        // Loop through product attributes
        foreach ($attributes as $key => $value) {
            if ($key === $option) {
                $attributes[$key]['is_visible'] = $data;

                break;
            }
        }

        // Set updated attributes back in database
        update_post_meta(
            post_id: $id,
            meta_key: '_product_attributes',
            meta_value: $attributes,
        );
    }
}
