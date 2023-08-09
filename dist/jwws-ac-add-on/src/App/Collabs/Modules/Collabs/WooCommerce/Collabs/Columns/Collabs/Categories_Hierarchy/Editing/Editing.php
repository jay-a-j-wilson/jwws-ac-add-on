<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Categories_Hierarchy\Editing;

use ACP\Editing\Service;
use ACP\Editing\View;
use JWWS\ACA\App\Collabs\Modules\Collabs\WooCommerce\Collabs\Columns\Collabs\Categories_Hierarchy\Column\Pro\Pro;

/**
 * Editing class. Adds editing functionality to the column.
 */
final class Editing implements Service {
    /**
     * @return void
     */
    public function __construct(private Pro $column) {}

    public function get_value(int $id): void {
        // Retrieve the value for editing
        // For example: get_post_meta( $id, '_my_custom_field_example', true );
    }

    public function get_view(string $context): ?View {
        // Available views: text, textarea, media, float, togglable, select, ajaxselect
        // return new Editing\View\Text();
        // (Optional) use View specific modifiers
        // $view->set_clear_button( true );
        // $view->set_placeholder( 'Custom placeholder' );
        // $view->set_required( true );

        // (Optional) return a different view or disable editing based on context: bulk or single (index)
        // $context === Service::CONTEXT_BULK

        return null;
    }

    /**
     * Saves the value after using inline-edit.
     *
     * @param mixed $data
     */
    public function update(int $id, $data): void {
        // Store the value that has been entered with inline-edit
        // For example: update_post_meta( $id, '_my_custom_field_example', $value );
    }
}
