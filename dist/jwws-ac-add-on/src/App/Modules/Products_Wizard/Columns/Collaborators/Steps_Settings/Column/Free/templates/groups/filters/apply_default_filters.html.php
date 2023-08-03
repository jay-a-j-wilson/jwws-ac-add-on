<?php

use JWWS\ACA\App\Modules\{Products_Wizard\Columns\Collaborators\Steps_Settings\Column\Free\Helpers\Boolean\Boolean};

?>

<!-- Apply default filter values -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        Apply default filter values
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['apply_default_filters'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>