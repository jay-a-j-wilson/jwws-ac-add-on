<?php

use JWWS\ACA\App\Modules\{Products_Wizard\Columns\Collaborators\Steps_Settings\Column\Free\Helpers\Boolean\Boolean};

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