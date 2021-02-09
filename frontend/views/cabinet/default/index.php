<?php

/* @var $this yii\web\View */

use backend\forms\UserSearch;
use medin\entities\Products;
use medin\entities\Subscriptions;
use yii\helpers\Url;

$this->title = 'Cabinet';
$this->params['breadcrumbs'][] = $this->title;
$searchModel = new UserSearch();
//$subscription = Subscriptions::find()->JoinWith(['tariff t'], true, 'INNER JOIN')->where(['user_id' => \Yii::$app->user->getId()])->one();

?>

    <div class="alert alert-danger" role="alert">
        <?= Yii::t('app', 'us to see more') ?>
    </div>
<?php if (Yii::$app->user->can('clinic')): ?>
    <div class="row">
        <div class="cabinet-index">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3><?= \medin\entities\Orders::find()->where(['user_id' => \Yii::$app->user->getId()])->count(); ?>
                            <sup style="font-size: 20px"></sup></h3>
                        <p><?= Yii::t('app', 'Orders') ?></p>
                    </div>
                    <div class="icon"><i class="fa fa-sitemap"></i></div>
                    <a href="<?= Url::to('/cabinet/orders') ?>" class="small-box-footer"><?= Yii::t('app', 'Go') ?> <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (Yii::$app->user->can('distributor')): ?>
    <div class="row">
        <div class="cabinet-index">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3><?= Products::find()->where(['user_id' => \Yii::$app->user->getId()])->count(); ?><sup
                                    style="font-size: 20px"></sup></h3>
                        <p><?= Yii::t('app', 'Distributor') ?></p><br>
                        <p></p>
                    </div>
                    <div class="icon"><i class="fa fa-sitemap"></i></div>
                    <a href="<?= Url::to('/cabinet/products') ?>" class="small-box-footer"><?= Yii::t('app', 'Go') ?> <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

<!--        <div class="cabinet-index">-->
<!--            <div class="col-lg-9 col-xs-6">-->
<!--                <div class="small-box bg-blue">-->
<!--                    <div class="inner">-->
<!--                        --><?php //if (isset($subscription) && $subscription): ?>
<!--                            <h3>--><?//= Yii::t('app', 'Name of your Tariff:') ?>
<!--                                <strong>--><?//= $subscription->tariff->title_ru ?><!--</strong></h3>-->
<!--                            <p>--><?//= Yii::t('app', 'Date of started your Tariff:') ?>
<!--                                <strong>--><?//= date('F d, Y', $subscription->start_time) ?><!--</strong>-->
<!--                            </p>-->
<!--                            <p>--><?//= Yii::t('app', 'Date of ended your Tariff:') ?>
<!--                                <strong>--><?//= date('F d, Y', $subscription->end_time) ?><!-- </strong>-->
<!--                            </p>-->
<!--                        --><?php //else: ?>
<!--                            <h3>--><?//= Yii::t('app', 'Name of your Tariff:') ?>
<!--                                <strong>--><?//= Yii::t('app', 'no available') ?><!--</strong></h3>-->
<!--                            <p>--><?//= Yii::t('app', 'Date of started your Tariff:') ?>
<!--                                <strong>--><?//= Yii::t('app', 'no available') ?><!--</strong>-->
<!--                            </p>-->
<!--                            <p>--><?//= Yii::t('app', 'Date of ended your Tariff:') ?>
<!--                                <strong>--><?//= Yii::t('app', 'no available') ?><!--</strong>-->
<!--                            </p>-->
<!--                        --><?php //endif; ?>
<!--                    </div>-->
<!--                    <div class="icon"><i class="fa fa-sitemap"></i></div>-->
<!--                    <a href="--><?//= Url::to('/tariffs/index') ?><!--" class="small-box-footer">--><?//= Yii::t('app', 'Go') ?><!-- <i-->
<!--                                class="fa fa-arrow-circle-right"></i></a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
    </div>
<?php endif; ?>
