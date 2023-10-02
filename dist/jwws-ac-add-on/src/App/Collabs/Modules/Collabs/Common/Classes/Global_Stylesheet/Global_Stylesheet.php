<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Global_Stylesheet;

use function wp_enqueue_style;
use const JWWS\ACA\ASSETS_PATH;
use const JWWS\ACA\ASSETS_URL;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class Global_Stylesheet {
    /**
     * Factory method.
     */
    public static function of(string $handle): self {
        return new self(
            handle: $handle,
        );
    }

    /**
     * @return void
     */
    private function __construct(private readonly string $handle) {}

    public function enqueue(): void {
        wp_enqueue_style(
            handle: $this->handle,
            src: ASSETS_URL . '/css/styles.min.css',
            ver: filemtime(
                filename: ASSETS_PATH . '/css/styles.min.css',
            ),
        );
    }
}