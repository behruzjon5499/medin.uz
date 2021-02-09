<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model SignupForm */

use medin\forms\auth\SignupForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Sign Up');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-error">
        <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>
<div class="site-signup">
    <h1 style="text-align: center; "><?= Html::encode($this->title) ?></h1>

    <section id="rs-contact" class="rs-contact contact-section gray-color pb-100">

        <p style="text-align: center;"><?= Yii::t('app', 'Please fill out the following fields to signup') ?> </p>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-form">
                        <div id="form-messages"></div>
                        <?php $form = ActiveForm::begin(['id' => 'form-signup', 'enableClientScript' => false]); ?>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-field">
                                    <?= $form->field($model, 'first_name')->textInput(['maxlength' => 255, 'class' => '', 'style' => 'widht:10px;', 'heidht:200px !important;', 'placeholder' => Yii::t('app', 'First Name') . ' *'])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-field">
                                    <?= $form->field($model, 'last_name')->textInput(['maxlength' => 255, 'class' => '', 'style' => 'widht:10px;', 'heidht:200px !important;', 'placeholder' => Yii::t('app', 'Last Name') . ' *'])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-field">
                                    <?= $form->field($model, 'phone')->textInput(['maxlength' => 255, 'class' => '', 'style' => 'widht:10px;', 'heidht:200px !important;', 'placeholder' => Yii::t('app', 'Phone') . ' *'])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-field">
                                    <?= $form->field($model, 'address')->textInput(['maxlength' => 255, 'class' => '', 'style' => 'widht:10px;', 'heidht:200px !important;', 'placeholder' => Yii::t('app', 'Address') . ' *'])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-field">
                                    <?= $form->field($model, 'username')->textInput(['maxlength' => 255, 'class' => '', 'style' => 'widht:10px;', 'heidht:200px !important;', 'placeholder' => Yii::t('app', 'Username') . ' *'])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-field">
                                    <?= $form->field($model, 'email')->textInput(['maxlength' => 255, 'class' => '', 'style' => 'widht:10px;', 'heidht:200px !important;', 'placeholder' => Yii::t('app', 'Email') . ' *'])->label(false); ?>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-field">
                                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255, 'class' => '', 'style' => 'widht:10px;', 'heidht:200px !important;', 'placeholder' =>
                                        Yii::t('app', 'Password') . ' *'])->label(false); ?>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-field">
                                    <?= $form->field($model, 'inn_number')->textInput(['maxlength' => 255, 'class' => '', 'style' => 'widht:10px;', 'heidht:200px !important;', 'placeholder' => Yii::t('app', 'Inn Number')])->label(false); ?>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-field">
                                    <?= $form->field($model, 'organization_name')->textInput(['maxlength' => 255, 'class' => '', 'style' => 'widht:10px;', 'heidht:200px !important;', 'placeholder' => Yii::t('app', 'Organization Name')])->label(false); ?>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-field">
                                    <?= $form->field($model, 'reCaptcha')->widget(
                                        \himiklab\yii2\recaptcha\ReCaptcha2::className(),
                                        [
                                            'siteKey' => '6LdIOdgUAAAAAMP2fbeF1PISdXAodqnHpPzLcfAO', // unnecessary is reCaptcha component was set up
                                        ]
                                    ) ?></div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-field">
                                    <p><?= '* ' . Yii::t('app', 'Required') ?></p>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-field">
                                    <p style=""><?= Yii::t('app', 'If you have problem depend with registration,') ?>
                                        <a href="<?= \yii\helpers\Url::to(['feedback/create']) ?>"><?= Yii::t('app', 'contact') ?></a> <?= Yii::t('app', 'to us') ?></p>
                                </div>
                            </div>
                          <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <?= Html::submitButton(Yii::t('app', 'Sign Up'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                                </div>
                            </div>
                            <div class="col-lg-3"></div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


