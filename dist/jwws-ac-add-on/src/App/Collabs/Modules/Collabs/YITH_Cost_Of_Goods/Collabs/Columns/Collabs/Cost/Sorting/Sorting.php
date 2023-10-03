<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Cost\Sorting;

use AC\Column;
use ACP\Sorting\Type\DataType;
use JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Sorting_Model\Sorting_Model;
use JWWS\ACA\App\Common\Utils\Collection;
use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Meta\Subclasses\Post_Meta\Post_Meta;

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
                value: DataType::NUMERIC,
            ),
        );
    }

    /**
     * (Optional) Put all the sorting logic here.
     * You can remove this function if you want to sort by raw value only.
     */
    public function get_sorting_vars(): array {
        return $this->sort_array(
            array: Collection::map_keys(
                items: $this->strategy->get_results(),
                func: fn (int $id): string => Post_Meta::of(id: $id)
                    ->find_by_key(key: 'yith_cog_cost'),
            ),
        );
    }
}
