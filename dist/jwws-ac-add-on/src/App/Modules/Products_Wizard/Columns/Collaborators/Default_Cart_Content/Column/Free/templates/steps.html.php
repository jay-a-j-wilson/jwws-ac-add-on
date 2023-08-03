<div class="JW_ACA--l-container JW_ACA--u-gap--row-xs">

    <?php if (is_iterable(value: $values)) : ?>
        <?php foreach ($values as $value_key => $value) : ?>

            <div class="JW_ACA--c-card">
                <div class="
                    JW_ACA--c-card__body
                    JW_ACA--u-flex--direction-row
                    JW_ACA--u-flex--justify-content-between
                    JW_ACA--u-flex--align-items-center
                    JW_ACA--u-size--height-min-20px
                ">
                    <span class="JW_ACA--c-card__title">
                        #<?= $value_key + 1; ?>
                    </span>
                    <samp class="
                        JW_ACA--c-display--flex
                        JW_ACA--u-flex--align-items-center
                        JW_ACA--u-gap--column-xs
                    ">
                        <?php if ($value !== null) : ?>
                            <?php
                            $product_id = empty($value['variation_id'])
                                ? $value['product_id']
                                : $value['variation_id'];

                            $product = wc_get_product(the_product: $product_id);
                            ?>
                            <?=
                            wp_get_attachment_image(
                                attachment_id: $product->get_image_id(),
                                icon: true,
                                attr: ['class' => 'JW_ACA--u-size--12px'],
                            );
                            ?>
                            <span>
                                <?= $product->get_name(); ?>
                                [#<?= $product_id; ?>]
                            </span>
                        <?php endif; ?>
                    </samp>
                </div>
            </div>

        <?php endforeach; ?>
    <?php endif; ?>

</div>