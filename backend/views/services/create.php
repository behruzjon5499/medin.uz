<?php

/* @var $this yii\web\View */
/* @var $model \medin\entities\Services */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
