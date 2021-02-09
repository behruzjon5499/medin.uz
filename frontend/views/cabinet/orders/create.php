<?php

/* @var $this yii\web\View */
/* @var $model \medin\entities\Orders */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
