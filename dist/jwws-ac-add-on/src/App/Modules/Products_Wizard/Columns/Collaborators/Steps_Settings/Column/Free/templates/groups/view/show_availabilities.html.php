<?php

use JWWS\ACA\App\Modules\{Products_Wizard\Columns\Collaborators\Steps_Settings\Column\Free\Helpers\Boolean\Boolean};

?>

<!-- Show product availabilities -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        Show product availabilities
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['show_availabilities'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>