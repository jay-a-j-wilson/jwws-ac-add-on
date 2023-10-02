<?php foreach ($variations as $variation): ?>
    <div class="JW_ACA--u-display--flex JW_ACA--u-flex--justify-content-between">
        <span class="JW_ACA--u-color--dark_50">
            <strong><?= $variation['name'] ?: ''; ?></strong>
        </span>
        <span>
            <?php if ($variation['price'] === '') : ?>
                <?= $empty_char; ?>
            <?php else: ?>
                &nbsp;
                <?php if ($variation['sale_price'] !== '') : ?>
                    <del><?= wc_price(price: $variation['regular_price']); ?></del>
                    &nbsp;
                    <ins><?= wc_price(price: $variation['sale_price']); ?></ins>
                <?php else: ?>
                    <?= wc_price(price: $variation['regular_price']); ?>
                <?php endif; ?>
            <?php endif; ?>
        </span>
    </div>
<?php endforeach; ?>