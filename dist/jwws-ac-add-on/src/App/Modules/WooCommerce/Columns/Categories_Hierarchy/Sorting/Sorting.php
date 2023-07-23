<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\WooCommerce\Columns\Categories_Hierarchy\Sorting;

use AC\Column;
use ACP\Sorting\{
    AbstractModel,
    Sorter,
    Type\DataType
};

/**
 * Sorting class. Adds sorting functionality to the column.
 */
final class Sorting extends AbstractModel {
    private Column $column;

    /**
     * @return void
     */
    public function __construct(Column $column) {
        parent::__construct(
            data_type: new DataType(
                value: DataType::STRING,
            ),
        );

        $this->column = $column;
    }

    /**
     * (Optional) Put all the sorting logic here.
     * You can remove this function if you want to sort by raw value only.
     */
    public function get_sorting_vars(): array {
        $array = [];

        // Loops through all the available ID's for `post`, `user` or `comment`.
        foreach ($this->strategy->get_results() as $id) {
            // Start editing here.

            /*
             * Put all the column logic here to retrieve the value you need
             *
             * For example:
             * $value = get_post_meta( $id, '_my_custom_field_example', true );
             */
            $value = $this->column->get_value(id: $id);

            // Stop editing.

            $array[$id] = $value;
        }

        $ids = (new Sorter())
            ->sort(values: $array, data_type: $this->data_type);

        if ($this->get_order() === 'DESC') {
            $ids = array_reverse($ids);
        }

        // Sorts the array and return all id's to the main query
        return [
            'ids' => $ids,
        ];
    }
}
