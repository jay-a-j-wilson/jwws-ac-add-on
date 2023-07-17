<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Products_Wizard\Columns\Default_Cart_Content\Column\Free;

use const JWWS\ACA\{
    ASSETS_PATH,
    ASSETS_URL
};
use AC\Column;
use JWWS\ACA\{
    App\Modules\Products_Wizard\Columns\Default_Cart_Content\Column\Free\Helpers\View_Model\View_Model,
    Deps\JWWS\WPPF\Logger\Error_Logger\Error_Logger,
    Deps\JWWS\WPPF\Template\Template,
    Deps\JWWS\WPPF\WordPress\Meta\Subclasses\Post_Meta\Post_Meta
};

/**
 * @final
 */
class Free extends Column {
    /**
     * @return void
     */
    public function __construct(
        readonly private string $uid = 'jwws_aca-pw-column-default_cart_content',
    ) {
        $this
            ->set_type(type: $this->uid)
            ->set_group(group: 'jwws_aca-products_wizard')
            // Default column label.
            ->set_label(label: __(text: 'Default Cart Content', domain: 'jwws'))
        ;
    }

    /**
     * Returns the display value for the column.
     */
    public function get_value(mixed $wizard_id): string {
        return Template::of(path: __DIR__ . '/templates/template.html.php')
            ->assign(
                key: 'values',
                value: View_Model::of(wizard_id: $wizard_id)->settings(),
            )
            ->output()
        ;
    }

    /**
     * Get the raw, underlying value for the column
     * Not suitable for direct display, use get_value() for that
     * This value will be used by 'inline-edit' and get_value().
     */
    public function get_raw_value(mixed $wizard_id): mixed {
        return Post_Meta::of(id: $wizard_id)
            ->find_by_key(key: '_default_cart_content')
        ;
    }

    public function scripts(): void {
        $this->enqueue_styles();
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
}
