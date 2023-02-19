<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Columns\Attribute_Visibility\Editing;

use JWWS\Admin_Columns_Add_On\Modules\Columns\Attribute_Visibility\Column;
use ACP\Editing;

/**
 * Editing class. Adds editing functionality to the column.
 */
class Root implements Editing\Service {
    /**
     * @param privateColumn\Pro\Root $column
     */
    public function __construct(private Column\Pro\Root $column) {
    }

    /**
     * @param string $context
     */
    public function get_view(string $context): ?Editing\View {
        // Disables edit controls if attribute is not selected in column settings.
        if (empty($this->column->get_option(key: 'product_taxonomy_display'))) {
            return null;
        }

        return (new Editing\View\Select(
            options: [
                '1' => __(text: 'Yes', domain: 'jwws'),
                '0' => __(text: 'No', domain: 'jwws'),
            ],
        ))->set_clear_button(enable: true);
    }

    /**
     * @param int $product_id
     */
    public function get_value(int $product_id): mixed {
        return $this->column->get_value(product_id: $product_id);
    }

    /**
     * Saves the value after using inline-edit.
     *
     * @param int   $id
     * @param mixed $data
     */
    public function update(int $id, mixed $data): void {
        // Get product attributes
        $attributes = get_post_meta(
            post_id: $id,
            key: '_product_attributes',
            single: true,
        );

        // Loop through product attributes
        foreach ($attributes as $attribute_key => $attribute_value) {
            // Target specif attribute by its name
            if ($attribute_value['name'] == $this->column->get_option(key: 'product_taxonomy_display')) {
                // Set the new value in the array
                $attributes[$attribute_key]['is_visible'] = $data;

                break; // stop the loop
            }
        }

        // Set updated attributes back in database
        update_post_meta(
            post_id: $id,
            meta_key: '_product_attributes',
            meta_value: $attributes,
        );
    }
}
