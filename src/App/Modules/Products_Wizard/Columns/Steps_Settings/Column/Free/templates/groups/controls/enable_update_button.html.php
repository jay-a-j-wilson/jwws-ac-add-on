<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!----------------------------------------------------------------------------->
<!-- Enable "Add to cart" button -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <?php
        Template::of(__DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Enables/disables the "Add to cart" button on each product of this
                step.',
            ])
            ->output()
        ;
        ?>
        Enable "Update" button
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