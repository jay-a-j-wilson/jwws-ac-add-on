<?php

use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
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
<!-- "Add to cart" button behavior -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <span
            title="tooltip"
            class="JW_ACA--u-font--size-md dashicons dashicons-info"
        ></span>
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