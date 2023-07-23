<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Products_Wizard\Columns\Steps_Settings\Column\Free;

use const JWWS\ACA\{
    ASSETS_PATH,
    ASSETS_URL
};
use AC\Column;
use JWWS\ACA\{
    App\Modules\Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\View_Model\View_Model,
    Deps\JWWS\WPPF\Template\Template
};

/**
 * @final
 */
class Free extends Column {
    /**
     * @return void
     */
    public function __construct(
        readonly private string $uid = 'jwws_aca-pw-column-steps_settings',
    ) {
        $this
            ->set_type(type: $this->uid)
            ->set_group(group: 'jwws_aca-products_wizard')
            // Default column label.
            ->set_label(label: __(text: 'Steps Settings', domain: 'jwws'))
        ;
    }

    /**
     * Returns the display value for the column.
     */
    public function get_value(mixed $wizard_id): string {
        return Template::of(path: __DIR__ . '/templates/template.html.php')
            ->assign(
                key: 'steps',
                value: View_Model::of(wizard_id: $wizard_id)
                    ->formatted_steps_settings(),
            )
            ->output()
        ;
    }

    /**
     * Get the raw, underlying value for the column
     * Not suitable for direct display, use get_value() for that
     * This value will be used by 'inline-edit' and get_value().
     */
    public function get_raw_value(mixed $wizard_id): mixed {}

    /**
     * (Optional) Enqueue CSS + JavaScript on the admin listings screen.
     * You can remove this function is you do not use it!
     *
     * This action is called in the admin_head action on the listings screen
     * where your column values are displayed.
     *
     * Use this action to add CSS + JavaScript
     */
    public function scripts(): void {
        $this->enqueue_styles();
        $this->enqueue_scripts();
    }

    private function enqueue_styles(): void {
        wp_enqueue_style(
            handle: $this->uid,
            src: ASSETS_URL . '/css/styles.min.css',
            ver: filemtime(
                filename: ASSETS_PATH . '/css/styles.min.css',
            ),
        );
    }

    private function enqueue_scripts(): void {
        $path = 'assets/js/scripts.js';

        wp_enqueue_script(
            handle: $this->uid,
            src: plugin_dir_url(file: __FILE__) . $path,
            deps: [
                'jquery-ui-accordion',
                'jquery-ui-tooltip',
                'jquery-effects-fade',
            ],
            ver: filemtime(
                filename: plugin_dir_path(file: __FILE__) . $path,
            ),
            in_footer: true,
        );
    }
}
