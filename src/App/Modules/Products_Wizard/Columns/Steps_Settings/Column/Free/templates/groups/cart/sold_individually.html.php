<?php

use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!----------------------------------------------------------------------------->
<!-- Sold individually -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <?php include __DIR__ . "/../tooltip-icon.html.php"; ?>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            Shows/hides the quantity setting input of a product.
        </div>
        Sold individually
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['sold_individually'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>
