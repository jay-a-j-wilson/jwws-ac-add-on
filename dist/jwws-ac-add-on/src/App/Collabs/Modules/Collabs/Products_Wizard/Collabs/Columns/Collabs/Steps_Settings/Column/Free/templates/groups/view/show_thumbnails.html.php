<?php

use JWWS\ACA\App\Collabs\Modules\{
    Collabs\Products_Wizard\Collabs\Columns\Collabs\Steps_Settings\Column\Free\Helpers\Boolean\Boolean};

?>

<!----------------------------------------------------------------------------->
<!-- Show product thumbnails -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        Show product thumbnails
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['show_thumbnails'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>