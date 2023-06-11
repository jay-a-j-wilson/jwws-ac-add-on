<table class="jwws-aca-wcpw-column-discount">
    <tr>
        <th>Wizard</th>
        <th>Discount type</th>
        <th>Value</th>
    </tr>
    <?php foreach ($discounts as $discount): ?>
        <tr <?= $discount['id'] === 'All' ? 'class="jwws-italic"' : ''; ?>>
            <?php foreach ($discount as $key => $value): ?>
                <td <?= $key === 'id' ? 'class="jwws-bold"' : ''; ?>>
                    <?=$value; ?>
                </td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>