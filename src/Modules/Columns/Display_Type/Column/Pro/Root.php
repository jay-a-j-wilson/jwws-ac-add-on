<?php

namespace JWWS\ACA\Modules\Columns\Display_Type\Column\Pro;

use JWWS\ACA\Modules\Columns\Display_Type\{
    Column,
    Editing,
    Export,
    Sorting,
    Smart_Filtering,
    Filtering
};
use ACP\{
    ConditionalFormat\ConditionalFormatTrait,
    ConditionalFormat\Formattable,
    Editing\Editable,
    Export\Exportable,
    Sorting\Sortable,
    Search\Searchable,
    Filtering\Filterable,
};

class Root extends Column\Free\Root implements
    Formattable,
    Editable,
    Exportable,
    Sortable,
    Searchable,
    Filterable {
    use ConditionalFormatTrait;

    /**
     *
     */
    public function editing() {
        return new Editing\Root($this);
    }

    /**
     *
     */
    public function export() {
        return new Export\Root(column: $this);
    }

    /**
     *
     */
    public function sorting() {
        return new Sorting\Root(column: $this);
    }

    /**
     * Smart Filtering (internally named: Search).
     */
    public function search() {
        return new Smart_Filtering\Root();
    }

    /**
     *
     */
    public function filtering() {
        return new Filtering\Root(column: $this);
    }
}
