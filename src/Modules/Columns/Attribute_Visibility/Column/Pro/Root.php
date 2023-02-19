<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Columns\Attribute_Visibility\Column\Pro;

use ACP;
use JWWS\Admin_Columns_Add_On\Modules\Columns\Attribute_Visibility;

class Root extends Attribute_Visibility\Column\Free\Root implements
    ACP\Editing\Editable,
    ACP\Sorting\Sortable,
    ACP\Filtering\Filterable,
    ACP\Export\Exportable,
    ACP\Search\Searchable {
    /**
     *
     */
    public function editing() {
        return new Attribute_Visibility\Editing\Root($this);
    }

    /**
     *
     */
    public function sorting() {
        return new Attribute_Visibility\Sorting\Root(column: $this);
    }

    /**
     *
     */
    public function export() {
        return new Attribute_Visibility\Export\Root(column: $this);
    }

    /**
     *
     */
    public function filtering() {
        return new Attribute_Visibility\Filtering\Root(column: $this);
    }

    /**
     * Smart Filtering (internally named: Search).
     */
    public function search() {
        return new Attribute_Visibility\Smart_Filtering\Root();
    }
}
