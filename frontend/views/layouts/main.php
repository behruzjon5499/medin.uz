<?php

/* @var $this View */

/* @var $content string */

use frontend\assets\AppAsset;
use frontend\widgets\CanvasWidget;
use frontend\widgets\FooterWidget;
use frontend\widgets\MenuWidget;
use frontend\widgets\PartnerWidget;
use frontend\widgets\ToolbarWidget;
use yii\helpers\Html;
use yii\web\View;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta name="description" content="">

    <!-- responsive tag -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->

    <link rel="apple-touch-icon" href="/images/logoo.png">
    <link rel="shortcut icon" type="image/x-icon" href="/images/logoo.png">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php $this->head() ?>
</head>
<body class="defult-home">
<?php $this->beginBody() ?>
<!--Header Start-->
<header id="rs-header" class="rs-header">
    <!-- Toolbar Start -->
    <?= ToolbarWidget::widget() ?>
    <!-- Toolbar End -->

    <!-- Header Menu Start -->
    <?= MenuWidget::widget() ?>
    <!-- Header Menu End -->

    <!-- Canvas Menu start -->
    <?= CanvasWidget::widget() ?>
    <!-- Canvas Menu end -->
</header>
<!--Header End-->

<!-- Main content Start -->
<div class="main-content">
    <?= $content ?>
</div>
<!-- Main content End -->
<!-- Partner Start -->
<?= PartnerWidget::widget() ?>
<!-- Partner End -->
<!-- Footer Start -->
<?= FooterWidget::widget() ?>
<!-- Footer End -->


<!-- start scrollUp  -->
<div id="scrollUp">
    <i class="fa fa-angle-up"></i>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
