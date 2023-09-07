<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Profit_Dollar\Sorting;

use AC\Column;
use ACP\Sorting\AbstractModel;
use ACP\Sorting\Sorter;
use ACP\Sorting\Type\DataType;

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
            $value = $this->column->get_value($id);

            // Stop editing.

            $array[$id] = $value;
        }

        $ids = (new Sorter())
            ->sort(values: $array, data_type: $this->data_type)
        ;

        if ($this->get_order() === 'DESC') {
            $ids = array_reverse(array: $ids);
        }

        // Sorts the array and return all id's to the main query
        return [
            'ids' => $ids,
        ];
    }
}
