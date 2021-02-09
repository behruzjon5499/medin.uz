<?php

/* @var $this yii\web\View */
/* @var $model \medin\entities\ProductPhotos */

$this->title = Yii::t('app', 'Update Product Photos: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Photos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="product-photos-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
