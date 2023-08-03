<?php

use JWWS\ACA\Deps\JWWS\WPPF\{
    Template\Template,
    Dictionary\Standard_Dictionary\Standard_Dictionary
};
?>

<!-- Filter position -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(path: __DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Defines the position of the filter.',
                'The filter can be either: on the right / before the products /
                or in the sidebar.',
                'Keep in mind that the sidebar filter works only with the tabs
                mode.',
            ])
            ->output()
        ;
        ?>
        Filter position
    </td>
    <td>
        <samp>
            <?=
            Standard_Dictionary::new_instance()
                ->add(key: 'before-products', value: 'Before products')
                ->add(key: 'before-widget', value: 'Before sidebar widget')
                ->find_by_key(key: $group['filter_position'])
            ;
            ?>
        </samp>
    </td>
</tr>