<div class="JW_ACA--u-text--align-right">
    <?php if ($value === '') : ?>
        <?= $empty_char; ?>
    <?php else: ?>
        <strong>
            <span class="JW_ACA--u-color--<?= $value >= 0 ? 'success' : 'danger_50'; ?>">
                <?= $formatted_value; ?>
            </span>
        </strong>
    <?php endif; ?>
</div>