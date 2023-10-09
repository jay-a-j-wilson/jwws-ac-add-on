<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Options;

use AC\Column;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class Options {
    /**
     * Factory method.
     */
    public static function of(Column $column): static {
        return new self(
            column: $column,
        );
    }

    /**
     * @return void
     */
    private function __construct(private readonly Column $column) {}

    public function option(string $key): string {
        $option = $this->column->get_option(key: $key);

        return is_string(value: $option)
            ? $option
            : '';
    }
}
