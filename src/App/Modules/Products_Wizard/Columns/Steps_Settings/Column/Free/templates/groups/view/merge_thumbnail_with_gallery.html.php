<?php

use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!-- Merge thumbnail with gallery -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?php include __DIR__ . "/../tooltip-icon.html.php"; ?>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            Removes the galleries from the products and shows only the gallery
            images in thumbnails, formatted as a carousel.
        </div>
        Merge thumbnail with gallery
    </td>
    <td>
        <samp>
            <?=
            Boolean::from(value: $group['merge_thumbnail_with_gallery'])
                ->to_html();
            ?>
        </samp>
    </td>
</tr>