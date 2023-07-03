<!-- Attributes for using -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?php include __DIR__ . "/../tooltip-icon.html.php"; ?>
        <div role="tooltip" class="JW_ACA--c-tooltip">
            Product attribute values to fetch products
        </div>
        Attributes for using
    </td>
    <td>
        <?php if (! empty($group['attributes'])) : ?>
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