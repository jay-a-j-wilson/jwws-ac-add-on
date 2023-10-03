<?php declare(strict_types=1);

namespace JWWS\ACA\App\Collabs\Modules\Collabs\Common\Classes\Sorting_Model;

use ACP\Sorting\AbstractModel;
use ACP\Sorting\Sorter;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

abstract class Sorting_Model extends AbstractModel {
    /**
     * Sorts the array and return all id's to the main query.
     */
    protected function sort_array(array $array): array {
        $ids = (new Sorter())
            ->sort(values: $array, data_type: $this->data_type)
        ;

        return [
            'ids' => $this->get_order() === 'DESC'
                ? array_reverse(array: $ids)
                : $ids,
        ];
    }
}
