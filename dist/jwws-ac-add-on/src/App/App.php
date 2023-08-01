<?php declare(strict_types=1);

namespace JWWS\ACA\App;

use JWWS\ACA\App\Modules\Modules;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Loader;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class App {
    /**
     * Factory method.
     */
    public static function of(Loader $loader): self {
        return new self(loader: $loader);
    }

    /**
     * @return void
     */
    private function __construct(private readonly Loader $loader) {}

    /**
     * Hooks into WordPress.
     */
    public function hook(): void {
        add_action('wp_loaded', [$this, 'hook_loader']);

        if ($this->loader->can_activate()) {
            add_action('ac/ready', [$this, 'hook_modules']);
        }
    }

    public function hook_loader(): void {
        $this->loader->hook();
    }

    public function hook_modules(): void {
        Modules::new_instance()->hook();
    }
}
