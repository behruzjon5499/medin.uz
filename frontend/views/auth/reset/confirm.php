<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model ResetPasswordForm */

use medin\forms\auth\ResetPasswordForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Reset password');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>
<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-error">
        <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>
<div class="site-reset-password">
    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>
    <section id="rs-contact" class="rs-contact contact-section gray-color pb-100">
        <p style="text-align: center;"><?= Yii::t('app', 'Please choose your new password:') ?></p>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-form">
                        <?php $form = ActiveForm::begin(['id' => 'reset-password-form', 'enableClientScript' => false]); ?>

                        <div class="row">

                            <div class="col-md-12 col-sm-12">
                                <div class="form-field">
                                    <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
                                </div>
                            </div>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
