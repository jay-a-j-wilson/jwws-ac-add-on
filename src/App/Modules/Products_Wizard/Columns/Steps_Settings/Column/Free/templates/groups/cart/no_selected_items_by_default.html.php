<?php

use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!-- No selected items by default -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?php include __DIR__ . "/../tooltip-icon.html.php"; ?>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            Overwrites the two previous options.
        </div>
        No selected items by default
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['no_selected_items_by_default'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>