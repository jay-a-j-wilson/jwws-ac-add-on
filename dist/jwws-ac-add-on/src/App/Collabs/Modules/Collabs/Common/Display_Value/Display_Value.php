<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Display_Value;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class Display_Value {
    /**
     * Factory method.
     */
    public static function of($value): self {
        return new self($value);
    }

    /**
     * @return void
     */
    private function __construct(private readonly string $value) {}

    public function grey(): string {
        return "<span style=\"color: #999\">{$this->value}<span>";
    }
}
