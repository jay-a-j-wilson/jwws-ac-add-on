<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
?>

<!----------------------------------------------------------------------------->
<!-- Top description -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(path: __DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Area you can add a text for your customers before the products\'
                area of this step.',
                'In the description area you can also add custom fields to
                collect extra data from your customers using the special
                shortcode, as
                <code>[wcpw-step-input name="My custom filed"]</code>.',
            ])
            ->output()
        ;
        ?>
        Top description
    </td>
    <td>
        <?php if(! empty($group['description'])) : ?>
            <code>
                <samp>
                    <?= htmlspecialchars(string: $group['description']); ?>
                </samp>
            </code>
        <?php endif; ?>
    </td>
</tr>