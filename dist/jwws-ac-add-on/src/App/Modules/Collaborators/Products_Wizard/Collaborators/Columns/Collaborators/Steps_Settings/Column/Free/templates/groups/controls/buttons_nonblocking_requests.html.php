<?php

use JWWS\ACA\App\Modules\{
    Collaborators\Products_Wizard\Collaborators\Columns\Collaborators\Steps_Settings\Column\Free\Helpers\Boolean\Boolean};

?>

<!-- Make nonblocking requests -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        Make nonblocking requests
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['buttons_nonblocking_requests'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>