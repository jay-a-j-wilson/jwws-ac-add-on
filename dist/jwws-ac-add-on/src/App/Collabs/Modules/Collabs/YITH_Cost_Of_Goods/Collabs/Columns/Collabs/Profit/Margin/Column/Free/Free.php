<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Profit\Margin\Column\Free;

use AC\Column;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Global_Stylesheet\Global_Stylesheet;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Group\Enums\Group;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Heading\Heading;
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
        readonly private string $uid = 'jwws_aca-yith_cog-column-profit_margin',
    ) {
        $this
            // Identifier, pick an unique name. Single word, no spaces.
            // Underscores allowed.
            ->set_type(type: $this->uid)
            ->set_group(group: Group::YITH_COST_OF_GOODS->value)
            // Default column label.
            ->set_label(label: __(
                text: $this->heading()->value(),
                domain: 'jwws',
            ))
        ;
    }

    private function heading(): Heading {
        return Heading::of(
            label: 'Profit - Margin [Custom]',
            tip: 'Expressed as a percentage, it indicates how much profit the company makes for every dollar of revenue generated.',
        );
    }

    public function get_value(mixed $id): string {
        return Template::of(
            path: __DIR__ . '/../../../Common/templates/template.html.php'
        )
            ->assign(
                key: 'variations',
                value: $this->get_raw_value(id: $id),
            )
            ->assign(
                key: 'empty_char',
                value: $this->get_empty_char(),
            )
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
            'name'            => $product->variation_name(),
            'value'           => $product->profit_margin(),
            'value_formatted' => $product->profit_margin_with_sign(),
        ];
    }

    public function scripts(): void {
        Global_Stylesheet::of(handle: $this->uid)->enqueue();
    }
}
