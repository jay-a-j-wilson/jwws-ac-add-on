<?php

use JWWS\ACA\App\Collabs\Modules\{
    Collabs\Products_Wizard\Collabs\Columns\Collabs\Steps_Settings\Column\Free\Helpers\Boolean\Boolean};
use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;

?>

<!-- Hide choose element -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(path: __DIR__ . '/../tooltip.html.php')
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