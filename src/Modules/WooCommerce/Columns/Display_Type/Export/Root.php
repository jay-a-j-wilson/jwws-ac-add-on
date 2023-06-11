<?php

namespace JWWS\ACA\Modules\WooCommerce\Columns\Display_Type\Export;

/**
 * Export class. Adds export functionality to the column.
 */
class Root extends \ACP\Export\Model {
    /**
     * @param mixed $id
     */
    public function get_value($id) {
        // Start editing here.

        // Add the value you would like to be exported.
        // For example: $value = get_post_meta( $id, '_my_custom_field_example', true );

        return $this->column->get_raw_value($id);
        // Stop editing.
    }
}
