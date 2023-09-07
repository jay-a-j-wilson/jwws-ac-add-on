<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Display_Value;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class Display_Value {
    /**
     * Factory method.
     */
    public static function of(string $value): self {
        return new self(
            value: $value
        );
    }

    /**
     * @return void
     */
    private function __construct(private readonly string $value) {}

    /**
     * Rename to 'secondary'
     */
    public function grey(): string {
        return "<span style=\"color: #999\">{$this->value}<span>";
    }

    public function success(): string {
        return "<span style=\"color: #46b450\">{$this->value}<span>";
    }

    public function danger(): string {
        return "<span style=\"color: #dc3232\">{$this->value}<span>";
    }
}
