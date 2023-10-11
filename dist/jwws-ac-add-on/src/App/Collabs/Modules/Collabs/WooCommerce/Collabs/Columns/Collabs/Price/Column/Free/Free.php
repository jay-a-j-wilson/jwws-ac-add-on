<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Price\Column\Free;

use AC\Column;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Group\Enums\Group;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Factory\Product_Factory;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Subclasses\Simple\Simple;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Subclasses\Variable\Variable;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\WooCommerce\Product\Subclasses\Variation\Variation;
use JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Standard_Collection;
use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
use function __;

/**
 * @final
 */
class Free extends Column {
    /**
     * @return void
     */
    public function __construct(
        readonly private string $uid = 'jwws_aca-column-woocommerce-price',
    ) {
        $this
            // Identifier, pick an unique name. Single word, no spaces.
            // Underscores allowed.
            ->set_type(type: $this->uid)
            ->set_group(group: Group::WOOCOMMERCE->value)
            // Default column label.
            ->set_label(label: __(
                text: 'Price [Custom]',
                domain: 'jwws',
            ))
        ;
    }

    public function get_value(mixed $id): string {
        return Template::of(path: __DIR__ . '/templates/template.html.php')
            ->assign(key: 'variations', value: $this->get_raw_value(id: $id))
            ->assign(key: 'empty_char', value: $this->get_empty_char())
            ->output()
        ;
    }

    public function get_raw_value(mixed $id): string|array {
        $product = Product_Factory::of(id: $id)->create();

        return ! $product->has_child()
            ? [$this->view_model(product: $product)]
            : Standard_Collection::of(...$product->get_children())
                ->map(callback: fn (int $child_id): array => $this->view_model(
                    product: Product_Factory::of(id: $child_id)->create(),
                ))
                ->to_array()
        ;
    }

    private function view_model(Simple|Variable|Variation $product): array {
        return [
            'name'          => $product->variation_name(),
            'price'         => $product->get_price(),
            'regular_price' => $product->get_regular_price(),
            'sale_price'    => $product->get_sale_price(),
        ];
    }

    public function meta_key(): string {
        return 'price';
    }
}
