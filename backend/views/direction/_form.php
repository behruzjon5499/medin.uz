<?php

use kartik\file\FileInput;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \medin\entities\Direction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalogs-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true])->label('title ru') ?>
            <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true])->label('title uz') ?>
            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true])->label('title en') ?>
        </div>
        <div class="col-md-6"></div>
    </div>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
