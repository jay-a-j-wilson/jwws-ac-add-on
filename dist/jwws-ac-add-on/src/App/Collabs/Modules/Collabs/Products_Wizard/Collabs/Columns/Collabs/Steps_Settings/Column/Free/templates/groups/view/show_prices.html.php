<?php

use JWWS\ACA\App\Collabs\Modules\{
    Collabs\Products_Wizard\Collabs\Columns\Collabs\Steps_Settings\Column\Free\Helpers\Boolean\Boolean};

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
