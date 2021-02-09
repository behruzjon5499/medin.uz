<?php

/* @var $this yii\web\View */
/* @var $model \medin\entities\Library */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libraries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
