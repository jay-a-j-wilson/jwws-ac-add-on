<table class="jwws-aca-wcpw-column-discount">
    <tr>
        <th>Wizard</th>
        <th>Discount type</th>
        <th>Value</th>
    </tr>
    <?php foreach ($discounts as $discount): ?>
        <tr <?= $discount->wizard() === 'All' ? 'class="jwws-italic"' : ''; ?>>
            <td class="jwws-bold">
                <?= $discount->wizard(); ?>
            </td>
            <td>
                <?= $discount->type(); ?>
            </td>
            <td>
                <?= $discount->value(); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>