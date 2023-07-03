<?php

use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!-- "Add to cart" button behavior -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?php include __DIR__ . "/../tooltip-icon.html.php"; ?>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            Defines the action that is fired after a product is added to the
            cart.
        </div>
        "Add to cart" button behavior
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['add_to_cart_behavior'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>