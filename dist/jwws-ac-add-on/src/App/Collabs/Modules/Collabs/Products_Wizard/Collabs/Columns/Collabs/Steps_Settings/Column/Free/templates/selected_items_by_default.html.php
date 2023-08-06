<?php

use JWWS\ACA\Deps\JWWS\WPPF\Template\Template;
?>

<?php foreach ($step as $groups) : ?>
    <?php if (is_iterable(value: $groups)) : ?>
        <?php foreach ($groups as $group_key => $group) : ?>
            <?php if (isset($group['selected_items_by_default'])) : ?>
                <?=
                Template::of(path:
                    __DIR__ . '/groups/cart/templates/selected_items_by_default.html.php'
                )
                    ->assign(
                        key: 'selected_items_by_default',
                        value: $group['selected_items_by_default'])
                    ->output()
                ;
                ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
<?php endforeach; ?>