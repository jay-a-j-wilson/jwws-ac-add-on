<?php

namespace JWWS\ACA\App\Modules\WooCommerce\Columns\Display_Type\Column\Pro;

use JWWS\ACA\App\Modules\WooCommerce\Columns\Display_Type\{
    Column\Free\Free,
    Editing\Editing,
    Export\Export,
    Sorting\Sorting,
    Smart_Filtering\Smart_Filtering,
    Filtering\Filtering
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

class Pro extends Free implements
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
        return new Editing(column: $this);
    }

    /**
     *
     */
    public function export() {
        return new Export(column: $this);
    }

    /**
     *
     */
    public function sorting() {
        return new Sorting(column: $this);
    }

    /**
     * Smart Filtering (internally named: Search).
     */
    public function search() {
        return new Smart_Filtering();
    }

    /**
     *
     */
    public function filtering() {
        return new Filtering(column: $this);
    }
}
