<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!-- Enable "Order by" dropdown -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(__DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Shows the typical WooCommerce dropdown menu for the products\'
                order.',
            ])
            ->output()
        ;
        ?>
        Enable "Order by" dropdown
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['enable_order_by_dropdown'])
                ->to_html()
            ;
            ?>
        </samp>
    </td>
</tr>