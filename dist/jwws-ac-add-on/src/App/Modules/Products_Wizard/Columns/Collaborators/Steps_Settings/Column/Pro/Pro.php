<?php declare(strict_types=1);

namespace JWWS\ACA\App\Modules\Products_Wizard\Columns\Collaborators\Steps_Settings\Column\Pro;

use ACP\ConditionalFormat\ConditionalFormatTrait;
use JWWS\ACA\App\Modules\Interfaces\Proable;
use JWWS\ACA\App\Modules\Products_Wizard\Columns\Collaborators\Steps_Settings\Column\Free\Free;
use JWWS\ACA\App\Modules\Products_Wizard\Columns\Collaborators\Steps_Settings\Editing\Editing;
use JWWS\ACA\App\Modules\Products_Wizard\Columns\Collaborators\Steps_Settings\Export\Export;
use JWWS\ACA\App\Modules\Products_Wizard\Columns\Collaborators\Steps_Settings\Filtering\Filtering;
use JWWS\ACA\App\Modules\Products_Wizard\Columns\Collaborators\Steps_Settings\Smart_Filtering\Smart_Filtering;
use JWWS\ACA\App\Modules\Products_Wizard\Columns\Collaborators\Steps_Settings\Sorting\Sorting;

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
