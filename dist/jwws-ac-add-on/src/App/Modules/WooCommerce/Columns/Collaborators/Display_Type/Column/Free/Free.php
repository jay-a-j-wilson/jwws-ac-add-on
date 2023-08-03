<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Display_Type\Column\Free;

use AC\Column;
use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Meta\Subclasses\Term_Meta\Term_Meta;
use function __;

/**
 * @final
 */
class Free extends Column {
    /**
     * @return void
     */
    public function __construct(
        readonly private string $uid = 'column-display_type',
    ) {
        $this
            // Identifier, pick an unique name. Single word, no spaces.
            // Underscores allowed.
            ->set_type(type: $this->uid)
            ->set_group(group: 'woocommerce')
            // Default column label.
            ->set_label(label: __(text: 'Display Type', domain: 'jwws'))
        ;
    }

    /**
     * Returns the display value for the column.
     */
    public function get_value(mixed $product_cat_id): string {
        $value = $this->get_raw_value(product_cat_id: $product_cat_id);

        return empty($value)
            ? '-'
            : ucfirst(string: $value);
    }

    /**
     * Get the raw, underlying value for the column
     * Not suitable for direct display, use get_value() for that
     * This value will be used by 'inline-edit' and get_value().
     */
    public function get_raw_value(mixed $product_cat_id): mixed {
        return Term_Meta::of(id: $product_cat_id)
            ->find_by_key(key: 'display_type')
        ;
    }
}
