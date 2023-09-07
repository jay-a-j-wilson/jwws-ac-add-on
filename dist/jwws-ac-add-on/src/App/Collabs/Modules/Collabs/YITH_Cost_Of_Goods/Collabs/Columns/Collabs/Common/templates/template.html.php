<div class="JW_ACA--u-text--align-right">
    <?php if ($value === '') : ?>
        <?= $empty_char; ?>
    <?php else: ?>
        <strong>
            <span class="JW_ACA--u-colour--<?= $value >= 0 ? 'success' : 'danger'; ?>">
                <?= $formatted_value; ?>
            </span>
        </strong>
    <?php endif; ?>
</div>