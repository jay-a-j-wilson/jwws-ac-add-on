<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Collabs\Columns\Collabs\Hidden\Column\Free;

use AC\Column;
use Exception;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Group\Enums\Group;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Heading\Heading;
use JWWS\ACA\Deps\JWWS\WPPF\Logger\Error_Logger\Error_Logger;
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
            ->set_group(group: Group::PRODUCTS_WIZARD->value)
            // Default column label.
            ->set_label(label: __(
                text: $this->heading()->value(),
                domain: 'jwws',
            ))
        ;
    }

    public function meta_key(): string {
        return '_is_hidden_product';
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

    /**
     * TODO: Investigate return error best practices.
     *
     * @throws Exception
     */
    public function get_raw_value(mixed $id): string {
        return wc_get_product(the_product: $id)
            ->get_meta(key: $this->meta_key())
        ;
    }
}
