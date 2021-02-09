<?php

/* @var $this yii\web\View */
/* @var $model Services */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

use medin\entities\Services;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<div class="services-create">

    <div class="main-content">
        <div class="rs-breadcrumbs sec-color">
            <div class="breadcrumbs-image">
                <img src="/images/services.jpg" alt="Breadcrumbs Image">
                <div class="breadcrumbs-inner">
                    <div class="container">
                        <div class="breadcrumbs-text">
                            <h1 class="breadcrumbs-title"><?= Yii::t('app', 'Services') ?></h1>
                            <ul class="breadcrumbs-subtitle">
                                <li><a href="<?= Url::to(['site/index']) ?>"><i class="fa fa-home"></i> <?= Yii::t('app', 'Home') ?></a></li>
                                <li><?= Yii::t('app', 'Services') ?></li>
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
                        <?php $form = ActiveForm::begin(); ?>
                        <h4><?= Yii::t('app', 'Request for consultation with a service specialist')?></h4>
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="form-field">
                                    <?= $form->field($model, 'username')->textInput(['maxlength' => 255, 'placeholder' => Yii::t('app', 'Full Name')])->label(false); ?>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-field">
                                    <?= $form->field($model, 'phone')->textInput(['maxlength' => 255, 'placeholder' => Yii::t('app', 'Phone')])->label(false); ?>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-field">
                                    <?= $form->field($model, 'email')->textInput(['maxlength' => 255, 'placeholder' => Yii::t('app', 'Email')])->label(false); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="form-field">
                                    <?= $form->field($model, 'experience')->textInput(['maxlength' => 255, 'placeholder' => Yii::t('app', 'Experience')])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="form-field">
                                    <?= $form->field($model, 'organization_name')->textInput(['maxlength' => 255, 'placeholder' => Yii::t('app', 'Organization Name')])->label(false); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-field">
                                    <?= $form->field($model, 'description_ru')->textarea(['rows' => 8, 'class' => '', 'placeholder' => Yii::t('app', 'Message')])->label(false); ?>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-field">
                                    <?= $form->field($model, 'reCaptcha')->widget(
                                        \himiklab\yii2\recaptcha\ReCaptcha2::className(),
                                        [
                                            'siteKey' => '6LdIOdgUAAAAAMP2fbeF1PISdXAodqnHpPzLcfAO', // unnecessary is reCaptcha component was set up
                                        ]
                                    ) ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <?= Html::submitButton(Yii::t('app', Yii::t('app', 'Send')), ['class' => 'readon']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
