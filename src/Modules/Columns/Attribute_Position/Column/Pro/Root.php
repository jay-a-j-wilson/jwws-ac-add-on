<?php

namespace JWWS\Admin_Columns_Add_On\Modules\Columns\Attribute_Position\Column\Pro;

use JWWS\Admin_Columns_Add_On\Modules\Columns\Attribute_Position;
use ACP\{
    ConditionalFormat,
    Editing,
    Export,
    Sorting,
    Search,
    Filtering,
};

class Root extends Attribute_Position\Column\Free\Root implements
    ConditionalFormat\Formattable,
    Editing\Editable,
    Export\Exportable,
    Sorting\Sortable,
    Search\Searchable,
    Filtering\Filterable {
    use ConditionalFormat\ConditionalFormatTrait;

    /**
     *
     */
    public function editing() {
        return new Attribute_Position\Editing\Root($this);
    }

    /**
     *
     */
    public function export() {
        return new Attribute_Position\Export\Root(column: $this);
    }

    /**
     *
     */
    public function sorting() {
        return new Attribute_Position\Sorting\Root(column: $this);
    }

    /**
     * Smart Filtering (internally named: Search).
     */
    public function search() {
        return new Attribute_Position\Smart_Filtering\Root();
    }

    /**
     *
     */
    public function filtering() {
        return new Attribute_Position\Filtering\Root(column: $this);
    }
}
