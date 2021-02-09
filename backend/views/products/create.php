<?php

/* @var $this yii\web\View */
/* @var $model \medin\entities\Products */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
