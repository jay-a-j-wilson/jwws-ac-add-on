<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
?>
<!-- Thumbnail -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(path: __DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Defines a thumbnail which is shown in the navigation tab of the
                step.',
                'This works only with the Step-by-Step behavior.'
            ])
            ->output()
        ;
        ?>
        Thumbnail
    </td>
    <td>
        <?=
        wp_get_attachment_image(
            attachment_id: $group['thumbnail'],
            icon: true,
            attr: ['class' => 'JW_ACA--u-size--12px'],
        );
        ?>
    </td>
</tr>