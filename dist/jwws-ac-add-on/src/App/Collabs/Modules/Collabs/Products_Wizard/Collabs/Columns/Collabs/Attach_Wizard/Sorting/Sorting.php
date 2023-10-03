<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Products_Wizard\Collabs\Columns\Collabs\Attach_Wizard\Sorting;

use AC\Column;
use ACP\Sorting\Type\DataType;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Sorting_Model\Sorting_Model;
use JWWS\ACA\App\Common\Utils\Collection;

/**
 * Sorting class. Adds sorting functionality to the column.
 */
final class Sorting extends Sorting_Model {
    /**
     * @return void
     */
    public function __construct(readonly private Column $column) {
        parent::__construct(
            data_type: new DataType(
                value: DataType::STRING,
            ),
        );
    }

    public function get_sorting_vars(): array {
        return $this->sort_array(
            array: Collection::map_keys(
                items: $this->strategy->get_results(),
                func: fn (int $id): string => $this->column->get_raw_value($id),
            ),
        );
    }
}
