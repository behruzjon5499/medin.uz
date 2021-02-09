<?php

/* @var $this yii\web\View */
/* @var $model \medin\entities\DistributorsAndLinks */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Distributors And Links'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distributors-and-links-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
