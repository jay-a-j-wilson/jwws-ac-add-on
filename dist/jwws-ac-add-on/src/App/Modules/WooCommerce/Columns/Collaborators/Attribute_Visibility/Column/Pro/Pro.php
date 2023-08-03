<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Attribute_Visibility\Column\Pro;

use ACP\ConditionalFormat\ConditionalFormatTrait;
use JWWS\ACA\App\Modules\Interfaces\Proable;
use JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Attribute_Visibility\Column\Free\Free;
use JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Attribute_Visibility\Editing\Editing;
use JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Attribute_Visibility\Export\Export;
use JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Attribute_Visibility\Filtering\Filtering;
use JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Attribute_Visibility\Smart_Filtering\Smart_Filtering;
use JWWS\ACA\App\Modules\WooCommerce\Columns\Collaborators\Attribute_Visibility\Sorting\Sorting;

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
