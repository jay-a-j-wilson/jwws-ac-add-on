<div class="JW_ACA--l-container JW_ACA--u-gap--row-xs">

    <?php if (is_array(value: $values) || is_object(value: $values)) : ?>
        <?php foreach($values as $value): ?>

            <div class="JW_ACA--c-card">
                <div class="JW_ACA--c-card__body">
                    <div>
                        <?php if (is_null($value)) : ?>
                            &nbsp;
                        <?php else: ?>
                            <?php
                            $product = wc_get_product(
                                the_product: $value['product_id']
                            );
                            ?>
                            <?=
                            wp_get_attachment_image(
                                attachment_id: $product->get_image_id(),
                                icon: true,
                                attr: ['class' => 'JW_ACA--c-image--12px'],
                            );
                            ?>
                            <?= $product->get_title(); ?>
                            [#<?= $value['product_id']; ?>]
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    <?php endif; ?>

</div>