<?php

use JWWS\ACA\App\Modules\{
    Collaborators\Products_Wizard\Collaborators\Columns\Collaborators\Steps_Settings\Column\Free\Helpers\Boolean\Boolean};

?>

<!-- All items are selected by default	 -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        All items are selected by default
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['all_selected_items_by_default'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>
