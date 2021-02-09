<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model LoginForm */

use medin\forms\auth\LoginForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>
<div class="site-login">
    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>
    <section id="rs-contact" class="rs-contact contact-section gray-color pb-100">
        <p style="text-align: center;"> <?= Yii::t('app', 'Please fill out the following fields to login') ?> <?= Yii::t('app', 'If you are not pass from') ?> <a
                    href="<?= \yii\helpers\Url::to(['auth/signup/request']) ?>">Registration</a>  </p>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-form">
                        <div id="form-messages"></div>
                        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientScript' => false]); ?>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-field">
                                    <?= $form->field($model, 'username')->textInput(['maxlength' => 255, 'class' => '', 'style' => 'widht:10px;', 'heidht:200px !important;', 'placeholder' => Yii::t('app', 'Username')])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-field">
                                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255, 'class' => '', 'style' => 'widht:10px;', 'heidht:200px !important;', 'placeholder' => Yii::t('app', 'Password')])->label(false); ?>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <?= $form->field($model, 'rememberMe')->checkbox()->label(Yii::t('app', 'Remember me')) ?>
                                <div style="color:#999;margin:1em 0">
                                    <?= Yii::t('app', 'If you forgot your password you can'). ' ' . Html::a(Yii::t('app','reset it'), ['/reset']) ?>.
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                                </div>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
