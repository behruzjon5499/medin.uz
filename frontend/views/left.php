<?php

use survey\entities\Answers;
use survey\entities\Categories;
use survey\entities\Questions;
use survey\entities\Regions;
use survey\entities\Results;
use survey\entities\User\User;
use yii\helpers\Url;

$moderatorItems = [
    ['label' => 'Menu', 'options' => ['class' => 'header']],

    ['label' => Yii::t('app', 'Йўналишлар'), 'icon' => 'list-alt', 'url' => ['/categories/index'], 'template' => '<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-red">' . Categories::find()->count() . '</small></span></a>'],
    ['label' => Yii::t('app', 'Саволлвр'), 'icon' => 'question', 'url' => ['/questions/index'], 'template' => '<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-red">' . Questions::find()->count() . '</small></span></a>'],
    ['label' => Yii::t('app', 'Вариантлар'), 'icon' => 'comments', 'url' => ['/answers/index'], 'template' => '<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-red">' . Answers::find()->count() . '</small></span></a>'],
    ['label' => Yii::t('app', 'Натижалар'), 'icon' => 'check', 'url' => ['/results/index'], 'template' => '<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-red">' . Results::find()->count() . '</small></span></a>'],
    ['label' => Yii::t('app', 'Статистика'), 'icon' => 'bar-chart', 'url' => ['/results/stats'], 'template' => '<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-red">' . Results::find()->count() . '</small></span></a>'],
    ['label' => Yii::t('app', 'Ҳудудлар'), 'icon' => 'map-marker', 'url' => ['/regions/index'], 'template' => '<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-red">' . Regions::find()->count() . '</small></span></a>'],
];

$adminItems = [
    ['label' => Yii::t('app', 'Фойдаланувчилар'), 'icon' => 'users', 'url' => ['/user/index'], 'template' => '<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-red">' . User::find()->count() . '</small></span></a>'],
];

$adminItems = (Yii::$app->user->can('admin')) ? $adminItems : [];
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php if (Yii::$app->user->can('admin')) {
                        echo 'Administrator';
                    } else {
                        echo 'Moderator';
                    } ?>
                </p>
                <a href="<?= Url::toRoute(['user/index/']) ?>"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => array_merge($adminItems, $moderatorItems),
            ]
        ) ?>

    </section>

</aside>
