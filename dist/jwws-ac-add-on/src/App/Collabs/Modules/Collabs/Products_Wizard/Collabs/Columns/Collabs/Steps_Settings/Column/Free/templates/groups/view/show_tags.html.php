<?php

use JWWS\ACA\App\Collabs\Modules\{
    Collabs\Products_Wizard\Collabs\Columns\Collabs\Steps_Settings\Column\Free\Helpers\Boolean\Boolean};

?>

<!-- Show product tags -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        Show product tags
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['show_tags'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>