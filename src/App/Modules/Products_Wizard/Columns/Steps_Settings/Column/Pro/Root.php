<?php

namespace JWWS\ACA\App\Modules\Products_Wizard\Columns\Steps_Settings\Column\Pro;

use ACP\{
    ConditionalFormat\ConditionalFormatTrait,
    ConditionalFormat\Formattable,
    Editing\Editable,
    Export\Exportable,
    Filtering\Filterable,
    Search\Searchable,
    Sorting\Sortable,
};
use JWWS\ACA\App\Modules\Products_Wizard\Columns\Steps_Settings\{
    Column\Free\Free,
    Editing\Editing,
    Export\Export,
    Filtering\Filtering,
    Smart_Filtering\Smart_Filtering,
    Sorting\Sorting
};

final class Pro extends Free implements
    Editable,
    Exportable,
    Filterable,
    Formattable,
    Searchable,
    Sortable {
    use ConditionalFormatTrait;

    public function editing() {
        return new Editing(column: $this);
    }

    public function export() {
        return new Export(column: $this);
    }

    public function sorting() {
        return new Sorting(column: $this);
    }

    /**
     * Smart Filtering (internally named: Search).
     */
    public function search() {
        return new Smart_Filtering();
    }

    public function filtering() {
        return new Filtering(column: $this);
    }
}
