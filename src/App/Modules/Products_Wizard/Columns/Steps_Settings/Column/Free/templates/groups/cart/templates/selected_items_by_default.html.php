<?php if (! empty($selected_items_by_default)) : ?>
    <?php $last_key = array_key_last(array: $selected_items_by_default); ?>
    <?php foreach ($selected_items_by_default as $key => $item_id) : ?>
        <?php $default_product = wc_get_product(the_product: $item_id); ?>
        <samp class="
            JW_ACA--c-display--flex
            JW_ACA--u-flex--align-items-center
            JW_ACA--u-gap--column-xs
        ">
            <?=
            wp_get_attachment_image(
                attachment_id: $default_product->get_image_id(),
                icon: true,
                attr: ['class' => 'JW_ACA--u-size--12px'],
            );
            ?>
            <span>
                <?= $default_product->get_name(); ?>
                [#<?= $item_id; ?>]
            </span>
            <?php if($key !== $last_key) : ?>
                <br>
            <?php endif; ?>
        </samp>
    <?php endforeach; ?>
<?php endif; ?>