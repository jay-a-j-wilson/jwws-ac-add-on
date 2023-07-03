<?php

use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!-- Add to cart by quantity -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?php include __DIR__ . "/../tooltip-icon.html.php"; ?>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            <p class="JW_ACA--u-text--align-left">
                When this option is set, then all products having a quantity
                more than zero are added to the cart. When this option is
                selected the product selection icon is hidden. The products'
                quantity is still visible.
            </p>
            <p class="JW_ACA--u-text--align-left">
                The «Sold individually» setting shouldn't be enabled if this
                option is checked.
            </p>
        </div>
        Add to cart by quantity
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['add_to_cart_by_quantity'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>