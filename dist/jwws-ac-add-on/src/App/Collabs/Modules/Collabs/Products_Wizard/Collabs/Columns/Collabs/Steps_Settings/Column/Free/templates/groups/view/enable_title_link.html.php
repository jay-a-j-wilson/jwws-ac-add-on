<?php

use JWWS\ACA\App\Collabs\Modules\{
    Collabs\Products_Wizard\Collabs\Columns\Collabs\Steps_Settings\Column\Free\Helpers\Boolean\Boolean};

?>

<!----------------------------------------------------------------------------->
<!-- Enable product title link -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        Enable product title link
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['enable_title_link'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>