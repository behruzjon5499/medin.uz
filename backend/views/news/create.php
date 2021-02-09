<?php

/* @var $this yii\web\View */
/* @var $model \medin\entities\News */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'News'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
