<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Price\Column\Free;

use AC\Column;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Group\Enums\Group;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Product\Product;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Product_Variation\Product_Variation;
use JWWS\ACA\App\Common\Utils\Collection;
use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
use WC_Product;
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
        // return $this->get_prices(product: Product::of(id: $id));
        return $this->get_data(product: wc_get_product(the_product: $id));
    }

    public function get_data(WC_Product $product): array {
        if (! $product->is_type(type: 'variable')) {
            $product = Product::of(id: $product->get_id());

            return [
                [
                    'name'          => '',
                    'price'         => $product->get_price(),
                    'regular_price' => $product->get_regular_price(),
                    'sale_price'    => $product->get_sale_price(),
                ],
            ];
        }

        return Collection::map(
            items: $product->get_children(),
            func: function (int $child_id): array {
                $product = Product_Variation::of(id: $child_id);

                return [
                    'name'          => $product->name(),
                    'price'         => $product->get_price(),
                    'regular_price' => $product->get_regular_price(),
                    'sale_price'    => $product->get_sale_price(),
                ];
            },
        );
    }
}
