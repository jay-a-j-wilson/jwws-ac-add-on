<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Collabs\Columns\Collabs\Attach_Wizard\Column\Free;

use AC\Column;
use JWWS\ACA\Deps\JWWS\WPPF\Logger\Error_Logger\Error_Logger;
use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Meta\Subclasses\Post_Meta\Post_Meta;
use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\Post_Repo;

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
            ->set_label(
                label: __(
                    text: 'Attach Wizard [Custom]',
                    domain: 'jwws',
                ),
            )
        ;
    }

    /**
     * Returns the display value for the column.
     */
    public function get_value(mixed $id): string {
        $value = $this->get_raw_value(id: $id);

        if ($value === '') {
            return $this->get_empty_char();
        }

        return $value;
    }

    /**
     * Gets the raw, underlying value for the column.
     *
     * Not suitable for direct display, use get_value() for that
     * This value will be used by 'inline-edit' and get_value().
     */
    public function get_raw_value(mixed $id): string {
        $wizard_id = Post_Meta::of(id: $id)
            ->find_by_key(key: '_wcpw_attach_wizard')
        ;

        if ($wizard_id === '') {
            return '';
        }

        return Post_Repo::new_instance()
            ->find_by_id(id: (int) $wizard_id)
            ->post_title;
    }
}
