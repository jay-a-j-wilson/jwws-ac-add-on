<?php

use JWWS\ACA\App\Collabs\Modules\{
    Collabs\Products_Wizard\Collabs\Columns\Collabs\Steps_Settings\Column\Free\Helpers\Boolean\Boolean};
use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;

?>

<!-- Can select several products -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(path: __DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Hides the radio/checkbox icon on each product. If you enable this
                option, then the only way to select a product is the use of the
                individual controls of each product.',
            ])
            ->output()
        ;
        ?>
        Can select several products
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['several_products'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>