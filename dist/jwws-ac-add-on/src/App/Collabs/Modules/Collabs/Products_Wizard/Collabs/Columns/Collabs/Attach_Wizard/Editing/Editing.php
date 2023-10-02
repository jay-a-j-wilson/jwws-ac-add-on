<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Collabs\Columns\Collabs\Attach_Wizard\Editing;

use ACP\Editing\Service;
use ACP\Editing\View;
use JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Collabs\Columns\Collabs\Attach_Wizard\Column\Pro\Pro;
use JWWS\ACA\App\Common\Utils\Collection;

use function __;
use function get_posts;
use function update_post_meta;

/**
 * Editing class. Adds editing functionality to the column.
 */
final class Editing implements Service {
    /**
     * @return void
     */
    public function __construct(private Pro $column) {}

    public function get_view(string $context): ?View {
        $wizards = get_posts(
            args: [
                'post_type'   => 'wc_product_wizard',
                'post_status' => 'publish',
                'numberposts' => -1,
                'orderby'     => 'menu_order',
                'order'       => 'ASC',
            ],
        );

        $options = [];

        foreach ($wizards as $wizard) {
            $options[$wizard->ID] = __(
                text: $wizard->post_title,
                domain: 'jwws',
            );
        }

        return (new View\Select())
            ->set_clear_button(enable: true)
            ->set_options(options: $options)
        ;
    }

    public function get_value(int $id): mixed {
        return $this->column->get_value(id: $id);
    }

    /**
     * Saves the value after using inline-edit.
     */
    public function update(int $id, mixed $data): void {
        update_post_meta(
            post_id: $id,
            meta_key: '_wcpw_attach_wizard',
            meta_value: $data,
        );
    }
}
