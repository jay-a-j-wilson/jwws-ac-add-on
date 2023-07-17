<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!----------------------------------------------------------------------------->
<!-- Hide remove button -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(path: __DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'If enabled for the wizard in the cart widget, hides the Remove
                button if it is set as enabled from the "Control General
                settings".',
            ])
            ->output()
        ;
        ?>
        Hide remove button
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['hide_remove_button'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>