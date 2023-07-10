<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!----------------------------------------------------------------------------->
<!-- Sold individually -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(__DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Shows/hides the quantity setting input of a product.',
            ])
            ->output()
        ;
        ?>
        Sold individually
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['sold_individually'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>
