<?php

use medin\entities\Orders;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">


            <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true])->label('Company Name') ?>

            <?php //$form->field($model, 'title_uz')->textInput(['maxlength' => true])->label('Заголовок')
            ?>

            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true])->label('Product Name') ?>

        </div>
        <div class="col-md-6">

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'clinic_inn')->textInput(['maxlength' => true]) ?>
        </div>

    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
</div>
