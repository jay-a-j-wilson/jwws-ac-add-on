<?php declare(strict_types=1);

use JWWS\ACA\Deps\JWWS\WPPF\Dictionary\Standard_Dictionary\Standard_Dictionary;

?>

<?php if (! empty($setting['value'])) : ?>
    Type:
    <samp><?=
        Standard_Dictionary::new_instance()
            ->add(
                key: 'count',
                value: 'Fixed value',
            )
            ->add(
                key: 'selected-from-step',
                value: 'Count of selected products of steps',
            )
            ->add(
                key: 'least-from-step',
                value: 'Least product quantity of steps',
            )
            ->add(
                key: 'greatest-from-step',
                value: 'Greatest product quantity of steps',
            )
            ->add(
                key: 'sum-from-step',
                value: 'Sum of products quantities of steps',
            )
            ->add(
                key: 'step-input-value',
                value: 'Step input value',
            )
            ->find_by_key(key: $setting['type'])
        ;
    ?></samp>,
    Value: <samp><?= $setting['value']; ?></samp>
<?php endif; ?>