<?php

use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!-- Show product price -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        Show product price
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['show_prices'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>
