<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Display_Type\Column\Free;

use AC\Column;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Group\Enums\Group;
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
            ->set_group(group: Group::WOOCOMMERCE->value)
            // Default column label.
            ->set_label(
                label: __(
                    text: 'Display Type [Custom]',
                    domain: 'jwws',
                ),
            )
        ;
    }

    public function get_value(mixed $id): string {
        $value = $this->get_raw_value(id: $id);

        if ($value === '') {
            return $this->get_empty_char();
        }

        return ucfirst(string: $value);
    }

    public function get_raw_value(mixed $id): string|array {
        return Term_Meta::of(id: $id)
            ->find_by_key(key: 'display_type')
        ;
    }
}
