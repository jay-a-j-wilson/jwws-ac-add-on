<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Collabs\Columns\Collabs\Attach_Wizard\Column\Free;

use AC\Column;
use function __;
use function get_the_title;
use function wc_get_product;

/**
 * @final
 */
class Free extends Column {
    /**
     * @return void
     */
    public function __construct(
        readonly private string $uid = 'jwws_aca-pw-column-attach_wizard',
    ) {
        $this
            ->set_type(type: $this->uid)
            ->set_group(group: 'jwws_aca-products_wizard')
            // Default column label.
            ->set_label(label: __(text: 'Attach Wizard', domain: 'jwws'))
        ;
    }

    /**
     * Returns the display value for the column.
     */
    public function get_value(mixed $product_id): string {
        $value = $this->get_raw_value(product_id: $product_id);

        return empty($value)
            ? '-'
            : $value;
    }

    /**
     * Gets the raw, underlying value for the column.
     *
     * Not suitable for direct display, use get_value() for that
     * This value will be used by 'inline-edit' and get_value().
     */
    public function get_raw_value(mixed $product_id): mixed {
        $wizard_id = wc_get_product(the_product: $product_id)
            ->get_meta(key: '_wcpw_attach_wizard')
        ;

        return empty($wizard_id)
            ? null
            : get_the_title(post: $wizard_id);
    }
}
