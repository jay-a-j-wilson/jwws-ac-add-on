<?php

use JWWS\ACA\Deps\JWWS\WPPF\{
    Template\Template,
    Dictionary\Standard_Dictionary\Standard_Dictionary
};
?>

<!-- Description source -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(path: __DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'defines the source for the description of the products
                presented in the specific step.',
                'Available options are: product description, product short
                description, or nothing.',
            ])
            ->output()
        ;
        ?>
        Description source
    </td>
    <td>
        <samp>
            <?=
            Standard_Dictionary::new_instance()
                ->add(key: 'content', value: 'Product content')
                ->add(key: 'excerpt', value: 'Product short description')
                ->add(key: 'none', value: 'None')
                ->find_by_key(key: $group['item_description_source'])
            ;
            ?>
        </samp>
    </td>
</tr>