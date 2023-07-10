<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Interfaces;

use ACP\{
    ConditionalFormat\Formattable,
    Editing\Editable,
    Export\Exportable,
    Filtering\Filterable,
    Search\Searchable,
    Sorting\Sortable,
};

interface Proable extends
    Editable,
    Exportable,
    Filterable,
    Formattable,
    Searchable,
    Sortable {}
