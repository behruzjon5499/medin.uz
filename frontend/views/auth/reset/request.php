<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model PasswordResetRequestForm */

use medin\forms\auth\PasswordResetRequestForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Request password reset');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-error">
        <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>
<div class="site-request-password-reset">
    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>
    <section id="rs-contact" class="rs-contact contact-section gray-color pb-100">
        <p style="text-align: center;"><?= Yii::t('app', 'Please fill out your email. A link to reset password will be sent there.') ?></p>
        <div class="container">

            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form', 'enableClientScript' => false]); ?>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-field">
                                    <?= $form->field($model, 'email')->textInput(['maxlength' => 255, 'class' => '', 'style' => 'widht:10px;', 'heidht:200px !important;', 'placeholder' => Yii::t('app', 'Email')])->label(false); ?>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <?= Html::submitButton(Yii::t('app', 'Send'), ['class' => 'btn btn-primary']) ?>
                                </div>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </section>
</div>
