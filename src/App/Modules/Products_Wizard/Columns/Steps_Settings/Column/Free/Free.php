<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Products_Wizard\Columns\Steps_Settings\Column\Free;

use AC\Column;
use JWWS\ACA\{
    App\Modules\Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\View_Model\View_Model,
    Deps\JWWS\WPPF\Template\Template
};

class Free extends Column {
    /**
     * Identifier, pick an unique name.
     * Single word, no spaces. Underscores allowed.
     */
    private string $uid = 'column-jwws-pw-steps_settings';

    public function __construct() {
        $this
            ->set_type(type: $this->uid)
            ->set_group(group: 'jwws-products_wizard')
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
        wp_enqueue_style(
            handle: $this->uid,
            src: plugin_dir_url(file: __FILE__) . 'assets/css/styles.css',
        );

        wp_enqueue_script(
            handle: 'jw-aca-accordion',
            src: plugins_url(
                path: 'assets/js/scripts.js',
                plugin: __FILE__,
            ),
            deps: [
                'jquery-ui-accordion',
                'jquery-ui-tooltip',
                'jquery-effects-fade',
            ],
            in_footer: true,
        );
    }
}
