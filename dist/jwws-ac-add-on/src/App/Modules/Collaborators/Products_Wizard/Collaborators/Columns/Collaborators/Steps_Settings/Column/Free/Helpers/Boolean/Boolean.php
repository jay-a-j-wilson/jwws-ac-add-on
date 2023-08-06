<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Collaborators\Products_Wizard\Collaborators\Columns\Collaborators\Steps_Settings\Column\Free\Helpers\Boolean;

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class Boolean {
    /**
     * Factory method.
     */
    public static function from(mixed $value): self {
        return new self(
            value: strtoupper(
                string: var_export(
                    value: (bool) $value,
                    return: true,
                ),
            ),
        );
    }

    /**
     * @return void
     */
    private function __construct(readonly private string $value) {}

    /**
     * Returns boolean value wrapped in the specified html tag with a boolean
     * class name.
     *
     * @param string $tag
     *
     * @return $this
     */
    public function to_html($tag = 'span'): string {
        return Template::of(path: __DIR__ . '/templates/template.html.php')
            ->assign(key: 'value', value: $this->value)
            ->assign(key: 'tag', value: $tag)
            ->output()
        ;
    }

    /**
     * Returns the boolean value as a string..
     */
    public function to_string(): string {
        return $this->value;
    }
}
