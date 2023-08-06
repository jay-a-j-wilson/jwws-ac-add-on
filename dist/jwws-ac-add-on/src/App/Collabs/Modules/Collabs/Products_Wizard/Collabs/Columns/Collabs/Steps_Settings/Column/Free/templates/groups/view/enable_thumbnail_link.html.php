<?php

use JWWS\ACA\App\Collabs\Modules\{
    Collabs\Products_Wizard\Collabs\Columns\Collabs\Steps_Settings\Column\Free\Helpers\Boolean\Boolean};

?>

<!-- Enable thumbnail link -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        Enable thumbnail link
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['enable_thumbnail_link'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>