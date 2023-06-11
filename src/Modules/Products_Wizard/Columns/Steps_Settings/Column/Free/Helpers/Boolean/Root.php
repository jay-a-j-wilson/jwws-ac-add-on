<?php

namespace JWWS\ACA\Modules\Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean;

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * @package JWWS\ACA
 */
class Root {
    /**
     * @param mixed $value
     *
     * @return self
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
     * @param string $value
     *
     * @return void
     */
    private function __construct(private string $value) {
    }

    /**
     * Returns boolean value wrapped in the specified html tag with a boolean
     * class name.
     *
     * @param string $tag
     *
     * @return $this
     */
    public function to_html($tag = 'span'): string {
        return Template::create(filename: __DIR__ . '/templates/template')
            ->assign(names: 'value', value: $this->value, )
            ->assign(names: 'tag', value: $tag, )
            ->output()
        ;
    }

    /**
     * Returns the boolean value as a string..
     *
     * @return string
     */
    public function to_string(): string {
        return $this->value;
    }
}
