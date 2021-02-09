<?php

/* @var $this yii\web\View */
/* @var $model \medin\entities\Distributors */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Distributors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distributors-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
