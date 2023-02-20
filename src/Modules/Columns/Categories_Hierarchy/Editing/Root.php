<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Columns\Categories_Hierarchy\Editing;

use ACP\Editing;

/**
 * Editing class. Adds editing functionality to the column.
 */
class Root implements Editing\Service {
    /**
     * @param int $id
     */
    public function get_value(int $id): void {
        // Retrieve the value for editing
        // For example: get_post_meta( $id, '_my_custom_field_example', true );
    }

    /**
     * @param string $context
     */
    public function get_view(string $context): ?Editing\View {
        // Available views: text, textarea, media, float, togglable, select, ajaxselect
        // return new Editing\View\Text();
        // (Optional) use View specific modifiers
        //$view->set_clear_button( true );
        //$view->set_placeholder( 'Custom placeholder' );
        //$view->set_required( true );

        // (Optional) return a different view or disable editin based on context: bulk or single (index)
        // $context === Service::CONTEXT_BULK

        return null;
    }

    /**
     * Saves the value after using inline-edit.
     *
     * @param int   $id
     * @param mixed $data
     */
    public function update(int $id, $data): void {
        // Store the value that has been entered with inline-edit
        // For example: update_post_meta( $id, '_my_custom_field_example', $value );
    }
}
