<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\WooCommerce\Columns\Attribute_Position\Column\Pro;

use ACP\ConditionalFormat\ConditionalFormatTrait;
use JWWS\ACA\App\Modules\Interfaces\Proable;
use JWWS\ACA\App\Modules\WooCommerce\Columns\Attribute_Position\{
    Column\Free\Free,
    Editing\Editing,
    Export\Export,
    Filtering\Filtering,
    Smart_Filtering\Smart_Filtering,
    Sorting\Sorting
};

/**
 * @final
 */
class Pro extends Free implements Proable {
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
