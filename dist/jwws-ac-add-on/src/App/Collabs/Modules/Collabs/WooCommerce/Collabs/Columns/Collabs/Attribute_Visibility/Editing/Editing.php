<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Attribute_Visibility\Editing;

use AC\Helper\Select\Option;
use AC\Type\ToggleOptions;
use ACA\WC\Editing\Product\ProductNotSupportedReasonTrait;
use ACP\Editing\Service;
use ACP\Editing\Service\Editability;
use ACP\Editing\View;
use ACP\Editing\View\Toggle;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Product\Product;
use JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Attribute_Visibility\Column\Pro\Pro;
use JWWS\ACA\App\Common\Utils\Collection;
use JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Standard_Collection;
use JWWS\ACA\Deps\JWWS\WPPF\Logger\Error_Logger\Error_Logger;
use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Meta\Subclasses\Post_Meta\Post_Meta;
use function __;
use function update_post_meta;

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

    // /**
    //  * Saves the value after using inline-edit.
    //  */
    // public function update(int $id, mixed $data): void {
    //     if ($this->column->attribute_name() === '') {
    //         return;
    //     }
    //     $product = Product::of(id: $id);
    //     $x       =  $product
    //         ->attribute(key: $this->column->attribute_name())
    //         // ->set_visible(value: false)
    //     ;
    //     Error_Logger::log_verbose($x);
    //     $x->set_visible(value: false);
    //     Error_Logger::log_verbose($x);
    //     $product->set_attributes(
    //         raw_attributes: array_merge(
    //             $product->get_attributes(),
    //             [
    //                 $x,
    //             ],
    //         ),
    //     );
    //     $product->save();
    // }

    /**
     * TODO: Standard_Collection->each() to handle array keys.
     * Saves the value after using inline-edit.
     */
    public function update(int $id, mixed $data): void {
        $attributes = Post_Meta::of(id: $id)
            ->find_by_key(key: '_product_attributes')
        ;

        $valid_attributes = Standard_Collection::of(...$attributes)
            ->filter_by_key(
                callback: fn (string $key): bool =>
                    $key === $this->column->attribute_name(),
            )
        ;

        // Loop through product attributes
        foreach ($valid_attributes as $key => $value) {
            $attributes[$key]['is_visible'] = (int) $data;
        }

        // Set updated attributes back in database
        update_post_meta(
            post_id: $id,
            meta_key: '_product_attributes',
            meta_value: $attributes,
        );
    }
}
