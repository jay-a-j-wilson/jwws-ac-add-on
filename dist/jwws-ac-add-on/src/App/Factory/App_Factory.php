<?php declare(strict_types=1);

namespace JWWS\ACA\App\Factory;

use const JWWS\ACA\PLUGIN_DIR;
use JWWS\ACA\App\App;
use JWWS\ACA\App\Common\Enums\Plugin_Basename;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Plugin\Standard_Plugin\Standard_Plugin;
use JWWS\ACA\Deps\JWWS\WPPF\Loader\Standard_Loader\Standard_Loader;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class App_Factory {
    public static function new_instance(): self {
        return new self();
    }

    /**
     * @return void
     */
    private function __construct() {}

    public function create(): App {
        return App::of(
            loader: Standard_Loader::of(
                plugin: Standard_Plugin::of_slug(
                    slug: PLUGIN_DIR,
                    fallback_name: 'Admin Columns Add-On',
                )
                    ->add_dependencies(
                        plugins: Standard_Plugin::of_basename(
                            basename: Plugin_Basename::ADMIN_COLUMNS_PRO->value,
                            fallback_name: 'Admin Columns Pro',
                        ),
                    ),
            ),
        );
    }
}
