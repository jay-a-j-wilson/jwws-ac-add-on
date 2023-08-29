<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Collabs\Columns\Collabs\Discount\Column\Free\Helpers\Discount;

use function get_the_title;

final class Discount {
    public static function of(array $discount): self {
        return new self(
            discount: self::format(discount: $discount),
        );
    }

    /**
     * Formats discount data to work with Products Wizard version 11.2.0 and
     * onwards.
     */
    private static function format(array $discount): array {
        if (isset($discount['wizard'])) {
            $discount['id'] = $discount['wizard'];
        }

        return $discount;
    }

    /**
     * @return void
     */
    private function __construct(readonly private array $discount) {}

    public function wizard(): string {
        return empty($this->discount['id'])
            ? 'All'
            : get_the_title(post: $this->discount['id']);
    }

    public function value(): string {
        switch ($this->discount['type']) {
            case 'percentage':
                return '-' . $this->discount['value'] . '%';

            case 'precise_price':
                return '$' . $this->discount['value'];

            case 'fixed':
                return '-$' . $this->discount['value'];

            default:
                return $this->discount['value'];
        }
    }

    public function type(): string {
        return str_replace(
            search: '_',
            replace: ' ',
            subject: ucfirst(string: $this->discount['type']),
        );
    }
}
