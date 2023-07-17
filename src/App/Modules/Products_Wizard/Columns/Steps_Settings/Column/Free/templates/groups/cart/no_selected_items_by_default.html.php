<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!-- No selected items by default -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(path: __DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Overwrites the two previous options.',
            ])
            ->output()
        ;
        ?>
        No selected items by default
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['no_selected_items_by_default'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>