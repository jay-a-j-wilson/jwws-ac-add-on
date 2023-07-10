<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
use JWWS\ACA\App\Modules\{
    Products_Wizard\Columns\Steps_Settings\Column\Free\Helpers\Boolean\Boolean
};
?>

<!-- Merge thumbnail with gallery -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?php
        Template::of(__DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Removes the galleries from the products and shows only the
                gallery images in thumbnails, formatted as a carousel.',
            ])
            ->output()
        ;
        ?>
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