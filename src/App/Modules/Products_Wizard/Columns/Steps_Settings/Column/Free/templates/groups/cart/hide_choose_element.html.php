<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!-- Hide choose element -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(__DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Use with individual product controls or \'Add to cart by
                quantity\' setting.'
            ])
            ->output()
        ;
        ?>
        Hide choose element
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['hide_choose_element'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>