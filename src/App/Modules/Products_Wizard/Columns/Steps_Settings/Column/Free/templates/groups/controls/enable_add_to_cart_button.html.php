<?php

use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!----------------------------------------------------------------------------->
<!-- Enable "Add to cart" button -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        Enable "Add to cart" button
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['enable_add_to_cart_button'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>