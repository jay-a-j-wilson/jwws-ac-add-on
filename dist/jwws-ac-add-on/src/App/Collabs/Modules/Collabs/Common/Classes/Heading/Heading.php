<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Heading;

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class Heading {
    /**
     * Factory method.
     */
    public static function of(string $label, string $tip = ''): self {
        return new self(
            label: $label,
            tip: $tip
        );
    }

    /**
     * @return void
     */
    private function __construct(
        private readonly string $label,
        private readonly string $tip
    ) {}

    /**
     * Rename to 'secondary'
     */
    public function value(): string {
        return Template::of(path: __DIR__ . '/templates/template.html.php')
            ->assign(key: 'label', value: $this->label)
            ->assign(key: 'tip', value: $this->tip)
            ->output();
    }
}
