<?php

use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!-- Enable "Order by" dropdown -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?php include __DIR__ . "/../tooltip-icon.html.php"; ?>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            Shows the typical WooCommerce dropdown menu for the products' order.
        </div>
        Enable "Order by" dropdown
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['enable_order_by_dropdown'])
                ->to_html()
            ;
            ?>
        </samp>
    </td>
</tr>