<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Collabs\Columns\Collabs\Discount\Column\Free;

use AC\Column;
use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
use function __;
use function get_the_title;
use function wc_get_product;
use function wp_enqueue_style;

/**
 * @final
 */
class Free extends Column {
    /**
     * @return void 
     */
    public function __construct(
        readonly private string $uid = 'jwws_aca-pw-column-discount',
    ) {
        $this
            ->set_type(type: $this->uid)
            ->set_group(group: 'jwws_aca-products_wizard')
            // Default column label.
            ->set_label(label: __(text: 'Discount', domain: 'jwws'))
        ;
    }

    /**
     * Returns the display value for the column.
     */
    public function get_value(mixed $product_id): string {
        return $this->render(
            discounts: $this->get_raw_value(
                product_id: $product_id,
            ),
        );
    }

    /**
     * Renders output.
     */
    private function render(mixed $discounts): string {
        return empty($discounts)
            ? '-'
            : Template::of(path: __DIR__ . '/templates/template.html.php')
                ->assign(
                    key: 'discounts',
                    value: $this->format(discounts: $discounts),
                )
                ->output()
        ;
    }

    private function format(array $discounts): array {
        foreach ($discounts as $key => $value) {
            $discounts[$key]['id'] = $this->format_id(discount: $value);
            $discounts[$key]['value'] = $this->format_value(discount: $value);
            $discounts[$key]['type'] = $this->format_type(discount: $value);
        }

        return $discounts;
    }

    private function format_id(mixed $discount): string {
        return empty($discount['id'])
            ? 'All'
            : get_the_title(post: $discount['id']);
    }

    private function format_value(mixed $discount): string {
        switch ($discount['type']) {
            case 'percentage':
                return '-' . $discount['value'] . '%';

            case 'precise_price':
                return '$' . $discount['value'];

            case 'fixed':
                return '-$' . $discount['value'];

            default:
                return $discount['value'];
        }
    }

    private function format_type(mixed $discount): string {
        return str_replace(
            search: '_',
            replace: ' ',
            subject: ucfirst(string: $discount['type']),
        );
    }

    /**
     * Get the raw, underlying value for the column
     * Not suitable for direct display, use get_value() for that
     * This value will be used by 'inline-edit' and get_value().
     */
    public function get_raw_value(mixed $product_id): mixed {
        $discounts = wc_get_product(the_product: $product_id)
            ->get_meta(key: '_wcpw_discount')
        ;

        return $this->is_empty(discounts: $discounts)
            ? null
            : $discounts;
    }

    /**
     * Checks if discounts meta field has empty value.
     * Required as discounts that have been edited have empty values in the
     * database.
     */
    private function is_empty(mixed $discounts): bool {
        return is_array(value: $discounts)
        && count(value: $discounts) === 1
        && empty($discounts[0]['value'])
        && $discounts[0]['type'] === 'percentage';
    }

    /**
     * Enqueues CSS on the admin listings screen.
     */
    public function scripts(): void {
        $this->enqueue_styles();
    }

    private function enqueue_styles(): void {
        $path = 'assets/css/styles.css';

        wp_enqueue_style(
            handle: $this->uid,
            src: plugin_dir_url(file: __FILE__) . $path,
            ver: filemtime(
                filename: plugin_dir_path(file: __FILE__) . $path,
            ),
        );
    }
}
