<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Profit\Amount\Column\Free;

use AC\Column;
use JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Profit\Common\Product\Product;
use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
use function __;
use function wp_enqueue_style;
use const JWWS\ACA\ASSETS_PATH;
use const JWWS\ACA\ASSETS_URL;

/**
 * @final
 */
class Free extends Column {
    /**
     * @return void
     */
    public function __construct(
        readonly private string $uid = 'jwws_aca-yith_cog-column-profit_amount',
    ) {
        $this
            // Identifier, pick an unique name. Single word, no spaces.
            // Underscores allowed.
            ->set_type(type: $this->uid)
            ->set_group(group: 'jwws_aca-yith_cost_of_goods')
            // Default column label.
            ->set_label(label: __(
                text: 'Profit - Amount ($) [Custom]',
                domain: 'jwws',
            ))
        ;
    }

    /**
     * Returns the display value for the column.
     */
    public function get_value(mixed $product_id): string {
        $value = $this->get_raw_value(product_id: $product_id);

        return Template::of(path: __DIR__ . '/../../../Common/templates/template.html.php')
            ->assign(
                key: 'value',
                value: $value
            )
            ->assign(
                key: 'formatted_value',
                value: '$' . number_format(num: (float) $value, decimals: 2)
            )
            ->assign(
                key: 'empty_char',
                value: $this->get_empty_char(),
            )
            ->output()
        ;
    }

    /**
     * Get the raw, underlying value for the column.
     *
     * Not suitable for direct display, use get_value() for that
     * This value will be used by 'inline-edit' and get_value().
     */
    public function get_raw_value(mixed $product_id): mixed {
        return Product::of(id: $product_id)->profit_amount();
    }

    /**
     * (Optional) Enqueue CSS + JavaScript on the admin listings screen.
     * You can remove this function is you do not use it!
     *
     * This action is called in the admin_head action on the listings screen
     * where your column values are displayed.
     *
     * Use this action to add CSS + JavaScript
     */
    public function scripts(): void {
        $this->enqueue_styles();
    }

    private function enqueue_styles(): void {
        wp_enqueue_style(
            handle: $this->uid,
            src: ASSETS_URL . '/css/styles.min.css',
            ver: filemtime(
                filename: ASSETS_PATH . '/css/styles.min.css',
            ),
        );
    }
}
