<?php

use kartik\datetime\DateTimePicker;
use kartik\file\FileInput;
use medin\entities\Products;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-8">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#ru" aria-controls="ru" role="tab" data-toggle="tab">Русский</a>
                </li>
                <li role="presentation" class=""><a href="#uz" aria-controls="uz" role="tab" data-toggle="tab">Узбекский</a>
                </li>
                <li role="presentation" class=""><a href="#en" aria-controls="en" role="tab" data-toggle="tab">Английский</a>
                </li>
            </ul>


            <div class="tab-content">
                <br>
                <div role="tabpanel" class="tab-pane active" id="ru">
                    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true])->label('Заголовок') ?>
                    <?= $form->field($model, 'description_ru')->widget(CKEditor::class, [
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                            'language' => 'ru',
                        ])
                    ])->label('Контент') ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="uz">
                    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true])->label('Заголовок') ?>
                    <?= $form->field($model, 'description_uz')->widget(CKEditor::class, [
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['language' => 'uz'])
                    ])->label('Контент') ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="en">
                    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true])->label('Заголовок') ?>
                    <?= $form->field($model, 'description_en')->widget(CKEditor::class, [
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['language' => 'en'])
                    ])->label('Контент') ?>
                </div>
            </div>

        </div>
        <div class="col-md-4">

            <?php
            echo $form->field($model, 'main_photo')->widget(FileInput::class, [
                'options' => ['accept' => 'image/*'],
                'language' => 'ru',
                'pluginOptions' => [
                    'showCaption' => false,
                    'showRemove' => false,
                    'showUpload' => false,
                    'browseClass' => 'btn btn-primary btn-block',
                    // 'browseIcon' => ' ',
                    'browseLabel' => 'Рисунок',
                    'layoutTemplates' => [
                        'main1' => '<div class="kv-upload-progress hide"></div>{remove}{cancel}{upload}{browse}{preview}',
                    ],
                    'initialPreview' => [
                        Html::img($model->getThumbFileUrl('main_photo', 's32'), ['class' => 'file-preview-image', 'alt' => '', 'title' => '']),
                    ],
                ],
            ]);
            ?>

            <?= $form->field($model, 'price')->textInput() ?>

            <?= $form->field($model, 'old_price')->textInput() ?>


        </div>
    </div>
<div class="row">

    <div class="col-md-8">
        <?= $form->field($model, 'sale_description')->widget(CKEditor::class, [
            'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                'language' => 'ru',
            ]),
        ]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'catalog_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(
                \medin\entities\Catalogs::find()->all(),
                'id',
                'title_ru'
            )
        ) ?>
        <?php
        $model->date = date('d.m.Y H:i', $model->isNewRecord ? time() : $model->date);
        echo '<label class="control-label">Sale date</label>' . DateTimePicker::widget([
                'model' => $model,
                'attribute' => 'date',
                'name' => 'date',
                'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                'value' => date('d.m.Y H:i'),
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'd.m.yyyy hh:ii'
                ]
            ]);
        ?>

    </div>
</div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
