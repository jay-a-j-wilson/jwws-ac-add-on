<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Cost\Column\Free;

use const JWWS\ACA\ASSETS_PATH;
use const JWWS\ACA\ASSETS_URL;
use AC\Column;
use JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Common\Money_Formatter\Money_Formatter;
use JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Common\Product\Product;
use JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Common\Product_Variation\Product_Variation;
use JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Cost\Column\Free\Helpers\Product_Variation_DTO\Product_Variation_DTO;
use JWWS\ACA\Deps\JWWS\WPPF\Logger\Error_Logger\Error_Logger;
use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Meta\Subclasses\Post_Meta\Post_Meta;
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
            ->set_group(group: 'jwws_aca-yith_cost_of_goods')
            // Default column label.
            ->set_label(label: __(
                text: 'Cost [Custom]',
                domain: 'jwws',
            ))
        ;
    }

    public function get_value(mixed $id): string {
        return Template::of(path: __DIR__ . '/templates/template.html.php')
            ->assign(key: 'values', value: $this->get_raw_value(id: $id))
            ->output()
        ;
    }

    public function get_raw_value(mixed $id): string|array {
        return $this->get_costs(product: wc_get_product(the_product: $id));
    }

    public function get_costs(WC_Product $product): array {
        $costs = [];

        if ($product->is_type(type: 'variable')) {
            foreach ($product->get_children() as $child_id) {
                $product_variation = Product_Variation::of(id: $child_id);

                $costs[] = [
                    'name' => $product_variation->name(),
                    'cost' => $product_variation->cost(),
                ];
            }
        } else {
            $costs[] = [
                'name' => '',
                'cost' => Product::of(id: $product->get_id())->cost(),
            ];
        }

        return $costs;
    }

    /**
     * Enqueues CSS on the admin listings screen.
     */
    public function scripts(): void {
        $this->enqueue_styles();
    }

    private function enqueue_styles(): void {
        $path = '/css/styles.min.css';

        wp_enqueue_style(
            handle: $this->uid,
            src: ASSETS_URL . $path,
            ver: filemtime(
                filename: ASSETS_PATH . $path,
            ),
        );
    }
}
