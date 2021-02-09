<?php

/* @var $this yii\web\View */
/* @var $model \medin\entities\Catalogs */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Catalogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalogs-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
