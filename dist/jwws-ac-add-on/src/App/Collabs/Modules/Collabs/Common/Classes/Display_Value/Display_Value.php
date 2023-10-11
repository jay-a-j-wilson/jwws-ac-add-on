<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Display_Value;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class Display_Value {
    /**
     * Factory method.
     */
    public static function of(string $value): self {
        return new self(
            value: $value,
        );
    }

    /**
     * @return void
     */
    private function __construct(private readonly string $value) {}

    /**
     * Rename to 'secondary'.
     */
    public function grey(): string {
        return $this->render_html(hex_code: '#999');
    }

    public function success(): string {
        return $this->render_html(hex_code: '#46b450');
    }

    public function danger(): string {
        return $this->render_html(hex_code: '#dc3232');
    }

    private function render_html(string $hex_code): string {
        return "<span style=\"color: {$hex_code}\">{$this->value}<span>";
    }
}
