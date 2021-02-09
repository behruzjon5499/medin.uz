<?php

use backend\forms\OrdersSearch;
use medin\entities\Orders;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $orders Orders
 * @var $ordercount Orders
 * /* @var $searchModel OrdersSearch
 */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="main-content">
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs sec-color">
            <div class="breadcrumbs-image">
                <img src="/images/main.jpeg" style="width: 100% !important;" alt="Breadcrumbs Image">
                <div class="breadcrumbs-inner">
                    <div class="container">
                        <div class="breadcrumbs-text">
                            <h1 class="breadcrumbs-title"><?= Yii::t('app', 'Orders') ?></h1>
                            <ul class="breadcrumbs-subtitle">
                                <li><a href="<?= Url::to(['site/index']) ?>"><i class="fa fa-home"></i> <?= Yii::t('app', 'Home') ?></a></li>
                                <li><?= Yii::t('app', 'Orders') ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="rs-blog" class="rs-blog modified">
            <div class="container">
                <p>
                <?php if(Yii::$app->user->can('clinic')){
                 Html::a(Yii::t('app', 'Create'), ['/cabinet/orders/create'], ['class' => 'btn btn-success']);}?>
                </p>

                <div class="row">
                    <?php foreach ($orders as $order): ?>
                        <div class="col-md-4 col-sm-12">
                            <div class="blog-item">

                                <div class="content-wrapper">
                                    <p style="display: inline"><?= Yii::t('app', 'Product Name:') ?></p>
                                    <a class="title" style="font-family: cursive; " href="#"><?= $order->title_ru ?></a>
                                    <h4 style="font-family: cursive; "  ><?= $order->title_ru ?> phone:<?= $order->phone ?></h4>
                                    <div class="blog-meta">
                                        <ul>
                                            <li><i class="fa fa-calendar"></i><span><?=  date('F d, Y', $order->created_at) ?></span></li>
                                        </ul>

                                    </div>
                                    <div class="blog-desc">
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <h4 style="display: inline;margin-bottom: 30px; font-family: fantasy;"><?= Yii::t('app', 'Total number of orders') ?> </h4>
                <h3 style="display: inline;color: darkred"> <?= $ordercount ?></h3>
                <h4 style="display: inline; margin-left: 50px; font-family: fantasy;"><?= Yii::t('app', 'us to see more') ?> <a href="<?= Url::to(['feedback/create']) ?>"><?= Yii::t('app', 'contact') ?></a></h4>
                <p>
            </div>
        </div>


    </div>
</div>

