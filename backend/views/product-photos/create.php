<?php

/* @var $this yii\web\View */
/* @var $model \medin\entities\ProductPhotos */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Photos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-photos-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
