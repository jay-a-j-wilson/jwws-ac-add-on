<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Interfaces;

use ACP\ConditionalFormat\Formattable;
use ACP\Editing\Editable;
use ACP\Export\Exportable;
use ACP\Filtering\Filterable;
use ACP\Search\Searchable;
use ACP\Sorting\Sortable;

interface Proable extends
    Editable,
    Exportable,
    Filterable,
    Formattable,
    Searchable,
    Sortable {}
