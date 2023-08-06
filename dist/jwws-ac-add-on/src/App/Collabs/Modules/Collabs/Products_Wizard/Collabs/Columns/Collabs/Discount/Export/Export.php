<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Collabs\Columns\Collabs\Discount\Export;

use ACP\Export\Model;

/**
 * Export class. Adds export functionality to the column.
 */
final class Export extends Model {
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
