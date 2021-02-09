<?php

$distributorItems = [
    ['label' => 'Products', 'icon' => 'cart-plus', 'url' => ['/cabinet/products']],
    ['label' => 'Product Photos', 'icon' => 'dashboard', 'url' => ['/cabinet/product-photos']],
    ['label' => 'Distributors', 'icon' => 'cart-plus', 'url' => ['/cabinet/distributors']],
    ['label' => 'Distributors and links', 'icon' => 'cart-plus', 'url' => ['/cabinet/distributors-and-links']],

];

$clinicItems = [
['label' => 'Orders', 'icon' => 'cart-plus', 'url' => ['/cabinet/orders']],
];

$clinicItems = (Yii::$app->user->can('clinic')) ? $clinicItems : [];
$distributorItems = (Yii::$app->user->can('distributor')) ? $distributorItems : [];
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php if (Yii::$app->user->can('clinic')) {
                        echo 'Clinic';
                    } else {
                        echo 'Distributor';
                    } ?>
                </p>
            </div>
        </div>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => array_merge($distributorItems, $clinicItems),
            ]
        ) ?>

    </section>

</aside>
