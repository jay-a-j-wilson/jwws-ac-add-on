<?php

use JWWS\ACA\App\Modules\{Products_Wizard\Columns\Collaborators\Steps_Settings\Column\Free\Helpers\Boolean\Boolean};
use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;

?>

<!-- Hide edit button -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(path: __DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'If enabled for the wizard in the cart widget and results table,
                hides the Edit button if it is set from the "Control General
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
            Boolean::from(value: $group['hide_edit_button'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>