<?php

use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!-- Can select several products -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?php include __DIR__ . "/../tooltip-icon.html.php"; ?>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            Hides the radio/checkbox icon on each product. If you enable this
            option, then the only way to select a product is the use of the
            individual controls of each product.
        </div>
        Can select several products
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['several_products'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>