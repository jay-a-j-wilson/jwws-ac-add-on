<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Attribute_Builder\Column\Free;

use AC\Column;
use ACA\WC\Settings\Product\Attributes;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Display_Value\Display_Value;
use function __;
use function ac_helper;
use function wc_get_product;

/**
 * @final
 */
class Free extends Column {
    /**
     * @return void
     */
    public function __construct(
        readonly private string $uid = 'column-attribute_builder',
    ) {
        $this
            // Identifier, pick an unique name. Single word, no spaces.
            // Underscores allowed.
            ->set_type(type: $this->uid)
            ->set_group(group: 'woocommerce')
            // Default column label.
            ->set_label(label: __(
                text: 'Attribute Builder (Custom)',
                domain: 'jwws',
            ))
        ;
    }

    /**
     * Returns the display value for the column.
     */
    public function get_value(mixed $product_id): string {
        switch ($this->get_raw_value(product_id: $product_id)) {
            case 'No':
                return ac_helper()
                    ->icon
                    ->no(tooltip: __(text: 'No'))
                ;

            case 'Yes':
                return ac_helper()
                    ->icon
                    ->yes(tooltip: __(text: 'Yes'))
                ;

            case 'error_0':
                return Display_Value::of(
                    value: 'Attribute not selected in column settings',
                )
                    ->grey()
                ;

            case 'error_1':
                return Display_Value::of(value: 'Multiple values selected.')
                    ->grey()
                ;

            default:
                return $this->get_empty_char();
        }
    }

    /**
     * Get the raw, underlying value for the column.
     *
     * Not suitable for direct display, use get_value() for that
     * This value will be used by 'inline-edit' and get_value().
     */
    public function get_raw_value(mixed $product_id): mixed {
        $attribute = $this->get_option(key: 'product_taxonomy_display');

        if (empty($attribute)) {
            return 'error_0';
        }

        $product = wc_get_product(the_product: $product_id);

        $attributes = $product->get_attributes();

        if (! array_key_exists(key: $attribute, array: $attributes)) {
            return '';
        }

        if (count($attributes[$attribute]->get_options()) > 1) {
            return 'error_1';
        }

        return $product->get_attribute(attribute: $attribute);
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
