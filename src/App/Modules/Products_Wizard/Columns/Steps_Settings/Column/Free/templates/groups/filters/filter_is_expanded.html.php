<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!-- Expand filter by default -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(path: __DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Have the filter opened when the step is shown.',
            ])
            ->output()
        ;
        ?>
        Expand filter by default
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['filter_is_expanded'])
                ->to_html();
            ?>
            </samp>
    </td>
</tr>