<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Columns\Breadcrumbs_Title\Editing;

use ACP\Editing;
use function JWWS\console_log;
use function JWWS\log_error;

/**
 * Editing class. Adds editing functionality to the column.
 */
class Root implements Editing\Service {
    /**
     * @param int $id
     */
    public function get_value($id) {
        // Retrieve the value for editing
        // For example: get_post_meta( $id, '_my_custom_field_example', true );
        return get_option(option: 'wpseo_taxonomy_meta')['product_cat'][$id]['wpseo_bctitle'] ?? '';
    }

    /**
     * @param string $context
     */
    public function get_view($context): ?Editing\View {
        // Available views: text, textarea, media, float, togglable, select, ajaxselect
        return new Editing\View\Text();
        // (Optional) use View specific modifiers
        //$view->set_clear_button( true );
        //$view->set_placeholder( 'Custom placeholder' );
        //$view->set_required( true );

        // (Optional) return a different view or disable editin based on context: bulk or single (index)
        // $context === Service::CONTEXT_BULK
    }

    /**
     * Saves the value after using inline-edit.
     *
     * @param int   $id      Object ID
     * @param mixed $data    Value to be saved
     * @param mixed $request
     */
    public function update($request): void {
        // Store the value that has been entered with inline-edit
        // For example: update_post_meta( $id, '_my_custom_field_example', $value );
        $meta = get_option(option: 'wpseo_taxonomy_meta');
        $id   = $request->get('id');

        if (! isset($meta['product_cat'][$id]['wpseo_bctitle'])) {
            $meta['product_cat'][$id]['wpseo_bctitle'] = [];
        }

        $meta['product_cat'][$id]['wpseo_bctitle'] = $request->get('value');

        update_option(
            option: 'wpseo_taxonomy_meta',
            value: $meta,
        );
    }
}
