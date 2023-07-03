<?php

use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!-- Hide choose element -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?php include __DIR__ . "/../tooltip-icon.html.php"; ?>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            Use with individual product controls or 'Add to cart by quantity'
            setting.
        </div>
        Hide choose element
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['hide_choose_element'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>