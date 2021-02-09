<?php

/* @var $this yii\web\View */
/* @var $model \medin\entities\Tariffs */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tariffs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tariffs-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
