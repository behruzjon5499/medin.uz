<?php

/* @var $this yii\web\View */
/* @var $model \medin\entities\SliderPhotos */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slider Photos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-photos-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
