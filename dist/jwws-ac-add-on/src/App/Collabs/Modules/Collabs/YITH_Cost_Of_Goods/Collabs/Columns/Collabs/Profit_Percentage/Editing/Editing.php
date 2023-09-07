<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Profit_Percentage\Editing;

use AC\Helper\Select\Option;
use AC\Type\ToggleOptions;
use ACP\Editing\Service;
use ACP\Editing\View;
use ACP\Editing\View\Toggle;
use JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Profit_Percentage\Column\Pro\Pro;
use JWWS\ACA\Deps\JWWS\WPPF\Logger\Error_Logger\Error_Logger;
use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Meta\Subclasses\Post_Meta\Post_Meta;
use function __;
use function update_post_meta;

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
