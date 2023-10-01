<?php use JWWS\ACA\App\Collabs\Modules\Collabs\YITH_Cost_Of_Goods\Collabs\Columns\Collabs\Common\Money_Formatter\Money_Formatter; ?>

<?php foreach($values as $value): ?>
    <div class="JW_ACA--u-display--flex JW_ACA--u-flex--justify-content-between">
        <span>
            <strong><?= $value['name'] ?: ''; ?></strong>
        </span>
        <span>
            <?php if(empty($value['cost'])) : ?>
                –
            <?php else: ?>
                <?= wc_price(price: $value['cost']); ?>
            <?php endif; ?>
        </span>
    </div>
<?php endforeach; ?>