<?php

use medin\entities\Services;
use medin\helpers\LanguageHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel \backend\forms\ServicesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $services Services */


$this->title = Yii::t('app', 'Services');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-create">

    <div class="main-content">
        <div class="rs-breadcrumbs sec-color">
            <div class="breadcrumbs-image">
                <img src="/images/services.jpg" alt="Breadcrumbs Image">
                <div class="breadcrumbs-inner">
                    <div class="container">
                        <div class="breadcrumbs-text">
                            <h1 class="breadcrumbs-title"><?= Yii::t('app', 'Equipment Repair') ?></h1>
                            <ul class="breadcrumbs-subtitle">
                                <li><a href="<?= Url::to(['site/index']) ?>"><i class="fa fa-home"></i> <?= Yii::t('app', 'Home') ?></a></li>
                                <li><?= Yii::t('app', 'Equipment Repair') ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="rs-contact" class="rs-contact" style="background-color: #f6f6f6; padding-top: 30px;margin-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-form" style="max-width: 100%;">
                        <div id="form-messages"></div>
                        <?php if (Yii::$app->session->getFlash('success') !== NULL) { ?>
                            <div class="alert alert-success"><?= Yii::$app->session->getFlash('success'); ?></div>
                        <?php } ?>
                        <h4 style="font-family: cursive; " ><?= Yii::t('app', 'Request for consultation with a service specialist') ?> <a style="font-family: cursive; "  href="<?= Url::to(['services/create']) ?>"><?=Yii::t('app', 'contact') ?> </a></h4>

                        <div class="row">
                            <?php foreach ($services as $service): ?>
                                <div class="col-lg-12 col-md-4 mb-md-30">
                                    <div class="ps-informations mb-md-30">
                                        <ul>
                                            <li>
                                                <span style="font-family: sans-serif"><?= Yii::t('app', 'Username') ?>: </span> <?= $service->username ?>
                                            </li>
                                            <li><span style="font-family: sans-serif" ><?= Yii::t('app', 'Phone') ?>: </span><?= $service->phone ?></li>
                                            <li><span style="font-family: sans-serif"><?= Yii::t('app', 'Email') ?>: </span><?= $service->email ?></li>
                                            <li><span style="font-family: sans-serif"><?= Yii::t('app', 'Organization Name') ?>: </span><?= $service->organization_name ?></li>
                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>


