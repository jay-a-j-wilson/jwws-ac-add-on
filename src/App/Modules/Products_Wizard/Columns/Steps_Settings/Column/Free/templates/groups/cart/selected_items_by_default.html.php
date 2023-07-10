<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
?>

<!----------------------------------------------------------------------------->
<!-- Selected items by default -->
<tr class="JW_ACA--u-border--width-4">
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(__DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Define the products that are selected by default when entering
                this step. Also by this option you can define specific product
                variations as checked.',
                'Hides the radio/checkbox icon on each product. If you enable
                this option, then the only way to select a product is the use of
                the individual controls of each product.'
            ])
            ->output()
        ;
        ?>
        Selected items by default
    </td>
    <td>
        <?php if (! empty($group['selected_items_by_default'])) : ?>
            <?php foreach ($group['selected_items_by_default'] as $item_id) : ?>
                <?php $default_product = wc_get_product(the_product: $item_id); ?>
                <samp>
                    <?=
                    wp_get_attachment_image(
                        attachment_id: $default_product->get_image_id(),
                        icon: true,
                        attr: ['class' => 'JW_ACA--c-image--12px'],
                    );
                    ?>
                    <?= $default_product->get_title(); ?>
                    [#<?= $item_id; ?>]
                </samp>
                <br>
            <?php endforeach; ?>
        <?php endif; ?>
    </td>
</tr>