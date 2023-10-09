<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Attribute_Position\Column\Free;

use AC\Column;
use ACA\WC\Settings\Product\Attributes;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Display_Value\Display_Value;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Group\Enums\Group;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Options\Options;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Product\Product;
use function __;

/**
 * @final
 */
class Free extends Column {
    /**
     * @return void
     */
    public function __construct(
        readonly private string $uid = 'column-attribute_position',
    ) {
        $this
            // Identifier, pick an unique name. Single word, no spaces.
            // Underscores allowed.
            ->set_type(type: $this->uid)
            ->set_group(group: Group::WOOCOMMERCE->value)
            // Default column label.
            ->set_label(label: __(
                text: 'Attribute - Position [Custom]',
                domain: 'jwws',
            ))
        ;
    }

    public function get_value(mixed $id): string {
        $value = $this->get_raw_value(id: $id);

        return match ($value) {
            'error_0' => Display_Value::of(
                value: 'Attribute not selected in column settings.',
            )
                ->grey(),
            'error_1' => Display_Value::of(
                value: "'{$this->attribute_label()}' attribute not assigned.",
            )
                ->grey(),
            default => $value,
        };
    }

    private function attribute_label(): string {
        return wc_attribute_label(
            name: $this->attribute_name(),
        );
    }

    public function attribute_name(): string {
        return Options::of(column: $this)
            ->option(key: 'product_taxonomy_display')
        ;
    }

    public function get_raw_value(mixed $id): string|array {
        $attribute = $this->attribute_name();

        if ($attribute === '') {
            return 'error_0';
        }

        $product = Product::of(id: $id);

        if (! $product->has_attribute(key: $attribute)) {
            return 'error_1';
        }

        return (string) $product
            ->attribute(key: $attribute)
            ->get_position()
        ;
    }

    /**
     * (Optional) Create extra settings for you column.
     *
     * These are visible when editing a column.
     * You can remove this function is you do not use it!
     *
     * Write your own settings or use any of the standard available settings.
     */
    protected function register_settings(): void {
        $this->add_setting(
            setting: new Attributes(column: $this),
        );
    }
}
