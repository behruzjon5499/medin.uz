<?php

use backend\forms\UserSearch;
use medin\entities\Distributors;
use medin\entities\Orders;
use medin\entities\Products;
use medin\entities\User\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Панель управления';
$searchModel = new UserSearch();
?>

<div class="site-index">

    <div class="box">
        <div class="box-body">
            <div class="row">
                <?php $form = ActiveForm::begin(['action' => ['user/index'], 'method' => 'GET', 'options' => ['class' => 'searchForm']]); ?>
                <div class="col-sm-10">
                    <?= $form->field($searchModel, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Введите поисковый запрос'])->label(false) ?>
                </div>
                <div class="col-sm-2">
                    <?= Html::submitButton('<i class="fa fa-search"></i> Поиск', ['class' => 'btn btn-primary btn-block']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?= User::find()->where(['status' => 10])->count(); ?><sup style="font-size: 20px"></sup></h3>
                    <p><?= Yii::t('app', 'Активные пользователи') ?></p>
                </div>
                <div class="icon"><i class="fa fa-users"></i></div>
                <a href="<?= Url::to('user') ?>" class="small-box-footer"><?= Yii::t('app', 'Go') ?> <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-gray">
                <div class="inner">
                    <h3><?= User::find()->where(['status' => 0])->count(); ?><sup style="font-size: 20px"></sup></h3>
                    <p><?= Yii::t('app', 'Неактивные пользователи') ?></p>
                </div>
                <div class="icon"><i class="fa fa-users"></i></div>
                <a href="<?= Url::to('user') ?>" class="small-box-footer"><?= Yii::t('app', 'Go') ?> <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3><?= Products::find()->count(); ?><sup style="font-size: 20px"></sup></h3>
                    <p><?= Yii::t('app', 'Products') ?></p>
                </div>
                <div class="icon"><i class="fa fa-sitemap"></i></div>
                <a href="<?= Url::to('products') ?>" class="small-box-footer"><?= Yii::t('app', 'Go') ?> <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-olive">
                <div class="inner">
                    <h3><?= Distributors::find()->count(); ?><sup style="font-size: 20px"></sup></h3>
                    <p><?= Yii::t('app', 'Distributors') ?></p>
                </div>
                <div class="icon"><i class="fa fa-map-marker"></i></div>
                <a href="<?= Url::to('distributors') ?>" class="small-box-footer"><?= Yii::t('app', 'Go') ?> <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-olive">
                <div class="inner">
                    <h3><?= Orders::find()->count(); ?><sup style="font-size: 20px"></sup></h3>
                    <p><?= Yii::t('app', 'Orders') ?></p>
                </div>
                <div class="icon"><i class="fa fa-map-marker"></i></div>
                <a href="<?= Url::to('orders') ?>" class="small-box-footer"><?= Yii::t('app', 'Go') ?> <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
