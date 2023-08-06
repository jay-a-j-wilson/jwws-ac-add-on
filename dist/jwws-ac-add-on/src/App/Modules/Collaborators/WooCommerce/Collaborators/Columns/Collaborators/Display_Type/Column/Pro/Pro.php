<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Collaborators\WooCommerce\Collaborators\Columns\Collaborators\Display_Type\Column\Pro;

use ACP\ConditionalFormat\ConditionalFormatTrait;
use JWWS\ACA\App\Modules\Collaborators\Interfaces\Proable;
use JWWS\ACA\App\Modules\Collaborators\WooCommerce\Collaborators\Columns\Collaborators\Display_Type\Column\Free\Free;
use JWWS\ACA\App\Modules\Collaborators\WooCommerce\Collaborators\Columns\Collaborators\Display_Type\Editing\Editing;
use JWWS\ACA\App\Modules\Collaborators\WooCommerce\Collaborators\Columns\Collaborators\Display_Type\Export\Export;
use JWWS\ACA\App\Modules\Collaborators\WooCommerce\Collaborators\Columns\Collaborators\Display_Type\Filtering\Filtering;
use JWWS\ACA\App\Modules\Collaborators\WooCommerce\Collaborators\Columns\Collaborators\Display_Type\Smart_Filtering\Smart_Filtering;
use JWWS\ACA\App\Modules\Collaborators\WooCommerce\Collaborators\Columns\Collaborators\Display_Type\Sorting\Sorting;

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
