<?php declare(strict_types=1);

use JWWS\ACA\Deps\JWWS\WPPF\{
    Template\Template,
    Dictionary\Standard_Dictionary\Standard_Dictionary
};
?>

<!-- "Add to cart" button behavior -->
<tr>
    <td class="JW_ACA--u-size--width-40">
        <?=
        Template::of(__DIR__ . '/../tooltip.html.php')
            ->assign(key: 'paragraphs', value: [
                'Defines the action that is fired after a product is added to
                the cart.',
            ])
            ->output()
        ;
        ?>
        "Add to cart" button behavior
    </td>
    <td>
        <samp>
            <?=
            Standard_Dictionary::new_instance()
                ->add(key: 'default', value: 'Stay on the same step')
                ->add(key: 'submit', value: 'Go next')
                ->add(key: 'add-to-main-cart', value: 'Add to main cart')
                ->find_by_key(key: $group['add_to_cart_behavior'])
            ;
            ?>
           </samp>
    </td>
</tr>