<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Collabs\Columns\Collabs\Steps_Settings\Column\Free;

use AC\Column;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Global_Stylesheet\Global_Stylesheet;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Group\Enums\Group;
use JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Collabs\Columns\Collabs\Steps_Settings\Column\Free\Helpers\View_Model\View_Model;
use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
use function __;
use function wp_enqueue_script;

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
            ->set_group(group: Group::PRODUCTS_WIZARD->value)
            // Default column label.
            ->set_label(
                label: __(text: 'Steps Settings [Custom]', domain: 'jwws'),
            )
        ;
    }

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

    public function get_raw_value(mixed $wizard_id): mixed {}

    public function scripts(): void {
        Global_Stylesheet::of(handle: $this->uid)->enqueue();
        $this->enqueue_scripts();
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
