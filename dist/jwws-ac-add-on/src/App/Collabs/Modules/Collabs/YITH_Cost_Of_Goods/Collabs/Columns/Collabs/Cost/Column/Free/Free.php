<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Cost\Column\Free;

use AC\Column;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Global_Stylesheet\Global_Stylesheet;
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
        readonly private string $uid = 'jwws_aca-yith_cog-column-cost',
    ) {
        $this
            // Identifier, pick an unique name. Single word, no spaces.
            // Underscores allowed.
            ->set_type(type: $this->uid)
            ->set_group(group: Group::YITH_COST_OF_GOODS->value)
            // Default column label.
            ->set_label(label: __(
                text: 'Cost [Custom]',
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
        return $this->get_data(product: wc_get_product(the_product: $id));
    }

    public function get_data(WC_Product $product): array {
        if (! $product->is_type(type: 'variable')) {
            $product = Product::of(id: $product->get_id());

            return [
                [
                    'name'  => '',
                    'value' => $product->cost(),
                ],
            ];
        }

        return Collection::map(
            items: $product->get_children(),
            func: function (int $child_id): array {
                $product = Product_Variation::of(id: $child_id);

                return [
                    'name'  => $product->name(),
                    'value' => $product->cost(),
                ];
            },
        );
    }

    public function map($items, $func) {
        $results = [];

        foreach ($items as $item) {
            $results[] = $func($item);
        }

        return $results;
    }

    public function scripts(): void {
        Global_Stylesheet::of(handle: $this->uid)->enqueue();
    }
}
