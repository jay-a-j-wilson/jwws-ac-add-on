<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Collabs\Columns\Collabs\Hidden\Column\Free;

use AC\Column;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Heading\Heading;
use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Meta\Subclasses\Post_Meta\Post_Meta;
use function __;
use function ac_helper;

/**
 * @final
 */
class Free extends Column {
    /**
     * @return void
     */
    public function __construct(
        readonly private string $uid = 'jwws_aca-pw-column-hidden',
    ) {
        $this
            ->set_type(type: $this->uid)
            ->set_group(group: 'jwws_aca-products_wizard')
            // Default column label.
            ->set_label(label: __(
                text: $this->heading()->value(),
                domain: 'jwws',
            ))
        ;
    }

    private function heading(): Heading {
        return Heading::of(
            label: 'Hidden [Custom]',
            tip: 'Product will be hidden from the shop and only available in the Products Wizard builders.',
        );
    }

    public function get_value(mixed $id): string {
        return match ($this->get_raw_value(id: $id)) {
            ''      => ac_helper()->icon->no(tooltip: __(text: 'No')),
            'yes'   => ac_helper()->icon->yes(tooltip: __(text: 'Yes')),
            default => $this->get_empty_char(),
        };
    }

    public function get_raw_value(mixed $id): string {
        $is_hidden_product = Post_Meta::of(id: $id)
            ->find_by_key(key: '_is_hidden_product')
        ;

        if ($is_hidden_product === '') {
            return '';
        }

        return $is_hidden_product;
    }
}
