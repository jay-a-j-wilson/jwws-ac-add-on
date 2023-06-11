<?php

namespace JWWS\ACA\Modules\Products_Wizard\Columns\Steps_Settings\Column\Free;

use JWWS\ACA\{
    Modules\Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\View_Model,
    Deps\JWWS\WPPF\Template\Template
};

class Root extends \AC\Column {
    /**
     * Identifier, pick an unique name.
     * Single word, no spaces. Underscores allowed.
     */
    private string $uid = 'column-jwws-pw-steps_settings';

    /**
     */
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
     *
     * @param mixed $wizard_id
     *
     * @return string
     */
    public function get_value(mixed $wizard_id): string {
        // Error_Log::print(
        //     output: View_Model\Root::from(wizard_id: $wizard_id)->get_formatted_steps_settings(),
        // );

        return Template::create(filename: __DIR__ . '/templates/template')
            ->assign(
                names: 'steps',
                value: View_Model\Root::of(wizard_id: $wizard_id)
                    ->get_formatted_steps_settings(),
                // value: Error_Log::log(
                //     output: View_Model\Root::create_from(wizard_id: $wizard_id)
                //         ->get_formatted_steps_settings(),
                // ),
            )
            ->output()
        ;
    }

    /**
     * Get the raw, underlying value for the column
     * Not suitable for direct display, use get_value() for that
     * This value will be used by 'inline-edit' and get_value().
     *
     * @param mixed $wizard_id
     *
     * @return mixed
     */
    public function get_raw_value(mixed $wizard_id): mixed {
    }

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
            handle: 'JW_ACA--jquery-ui',
            src: plugin_dir_url(file: __FILE__) . '/assets/css/jquery-ui.css',
        );

        wp_enqueue_style(
            handle: $this->uid,
            src: plugin_dir_url(file: __FILE__) . '/assets/css/styles.css',
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
