<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;

use frontend\widgets\ErrorWidget;

?>

<?= ErrorWidget::widget() ?>
