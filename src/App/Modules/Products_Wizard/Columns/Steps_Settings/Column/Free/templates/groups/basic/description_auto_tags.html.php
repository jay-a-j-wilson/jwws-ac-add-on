<?php

use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!-- Handle description with auto tags -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <?php include __DIR__ . "/../tooltip-icon.html.php"; ?>
        </span>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            Preserves the HTML-tags in the text and shows the text
            HTML-formatted.
        </div>
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