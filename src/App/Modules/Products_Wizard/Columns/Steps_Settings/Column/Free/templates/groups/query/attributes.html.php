<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
?>

<!-- Attributes for using -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(path: __DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Product attribute values to fetch products.',
            ])
            ->output()
        ;
        ?>
        Attributes for using
    </td>
    <td>
        <?php if (is_iterable(value: $group['attributes'])) : ?>
            <?php foreach ($group['attributes'] as $attribute) : ?>
                <?php
                    $attr_pair = explode(
                    separator: '#',
                    string: $attribute,
                );
                ?>
                <samp>
                    <?= wc_attribute_label(name: $attr_pair[0]); ?>
                    [#<?= $attr_pair[1]; ?>]
                </samp>
                <br>
            <?php endforeach; ?>
        <?php endif; ?>
    </td>
</tr>