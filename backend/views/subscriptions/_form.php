<?php

use kartik\datetime\DateTimePicker;
use medin\entities\Subscriptions;
use medin\entities\Tariffs;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model Subscriptions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalogs-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-8">

            <?= $form->field($model, 'user_id')->dropDownList($model->getDistributor())->label('Distributors') ?>

            <?= $form->field($model, 'tariff_id')->dropDownList(
                ArrayHelper::map(
                    Tariffs::find()->all(),
                    'id',
                    'title_ru'
                )
            ) ?>
            <?php
            $model->start_time = date('d.m.Y H:i', $model->isNewRecord ? time() : $model->start_time);
            echo '<label class="control-label">Start rime</label>' . DateTimePicker::widget([
                    'model' => $model,
                    'attribute' => 'start_time',
                    'name' => 'start_time',
                    'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                    'value' => date('d.m.Y H:i'),
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'd.m.yyyy hh:ii'
                    ]
                ]);
            ?>
            <?php
            $model->end_time = date('d.m.Y H:i', $model->isNewRecord ? time() : $model->end_time);
            echo '<label class="control-label">End time</label>' . DateTimePicker::widget([
                    'model' => $model,
                    'attribute' => 'end_time',
                    'name' => 'end_time',
                    'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                    'value' => date('d.m.Y H:i'),
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'd.m.yyyy hh:ii'
                    ]
                ]);
            ?>
        </div>

        <div class="col-md-4">

        </div>
    </div>


    <div class="form-group" style="margin-top: 30px;">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
