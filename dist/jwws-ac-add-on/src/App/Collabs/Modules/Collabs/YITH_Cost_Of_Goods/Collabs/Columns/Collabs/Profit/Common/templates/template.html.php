<?php foreach ($variations as $variation): ?>
    <div class="JW_ACA--u-display--flex JW_ACA--u-flex--justify-content-between">
        <span class="JW_ACA--u-color--dark_50">
            <strong><?= $variation['name'] ?: ''; ?></strong>
        </span>
        <span>
            <?php if ($variation['value'] === ''): ?>
                <?= $empty_char; ?>
            <?php else: ?>
                <strong>
                    <span class="JW_ACA--u-color--<?= $variation['value'] >= 0 ? 'success' : 'danger_50'; ?>">
                        &nbsp;<?= $variation['value_formatted']; ?>
                    </span>
                </strong>
            <?php endif; ?>
        </span>
    </div>
<?php endforeach; ?>