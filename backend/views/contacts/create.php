<?php

/* @var $this yii\web\View */
/* @var $model \medin\entities\Contacts */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacts-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
