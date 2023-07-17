<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Products_Wizard\Columns\Default_Cart_Content\Column\Free\Helpers\View_Model;

use JWWS\ACA\Deps\JWWS\WPPF\Logger\Error_Logger\Error_Logger;
use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Meta\Subclasses\Post_Meta\Post_Meta;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class View_Model {
    public static function of(int $wizard_id): self {
        return new self(
            settings: self::sort_settings(wizard_id: $wizard_id),
        );
    }

    private static function sort_settings(int $wizard_id): array {
        $settings = self::index_settings(
            settings: Post_Meta::of(id: $wizard_id)
                ->find_by_key(key: '_default_cart_content'),
        );

        $steps_ids = Post_Meta::of(id: $wizard_id)
            ->find_by_key(key: '_steps_ids')
        ;

        $sorted_settings = [];

        foreach ($steps_ids as $steps_id) {
            // if (! isset($settings[(int) $steps_id])) {
            //     continue;
            // }

            $sorted_settings[] = $settings[(int) $steps_id];
        }

        // Error_Logger::log_verbose($sorted_settings);

        return $sorted_settings;
    }

    private static function index_settings(array $settings): array {
        $indexed_settings = [];

        foreach ($settings as $setting) {
            $indexed_settings[$setting['step_id']] = $setting;
        }

        return $indexed_settings;
    }

    /**
     * @return void
     */
    private function __construct(readonly private array $settings) {}

    public function settings(): array {
        return $this->settings;
    }
}
