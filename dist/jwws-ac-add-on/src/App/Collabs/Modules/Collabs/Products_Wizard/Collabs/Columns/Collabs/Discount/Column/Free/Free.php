<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Collabs\Columns\Collabs\Discount\Column\Free;

use AC\Column;
use JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Collabs\Columns\Collabs\Discount\Column\Free\Helpers\Discount\Discount;
use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Meta\Subclasses\Post_Meta\Post_Meta;
use function __;
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
            ->set_label(label: __(text: 'Discount [Custom]', domain: 'jwws'))
        ;
    }

    /**
     * Returns the display value for the column.
     */
    public function get_value(mixed $id): string {
        return $this->render(
            discounts: $this->get_raw_value(
                id: $id,
            ),
        );
    }

    /**
     * Renders output.
     */
    private function render(mixed $discounts): string {
        return $discounts === ''
            ? $this->get_empty_char()
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
            $discounts[$key] = Discount::of(discount: $value);
        }

        return $discounts;
    }

    /**
     * Get the raw, underlying value for the column
     * Not suitable for direct display, use get_value() for that
     * This value will be used by 'inline-edit' and get_value().
     */
    public function get_raw_value(mixed $id): string|array {
        $discounts = Post_Meta::of(id: $id)
            ->find_by_key(key: '_wcpw_discount')
        ;

        if ($this->is_empty(discounts: $discounts)) {
            return '';
        }

        return $discounts;
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
