<?php

use JWWS\ACA\App\Collabs\Modules\{
    Collabs\Products_Wizard\Collabs\Columns\Collabs\Steps_Settings\Column\Free\Helpers\Boolean\Boolean};
use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;

?>

<!-- Handle description with auto tags -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(path: __DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Preserves the HTML-tags in the text and shows the text
                HTML-formatted.'
            ])
            ->output()
        ;
        ?>
        Handle description with auto tags
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['description_auto_tags'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>