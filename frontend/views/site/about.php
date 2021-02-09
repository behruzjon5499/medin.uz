<?php

/* @var $this yii\web\View
 * @var $about Pages
 */

use abdualiym\cms\entities\Pages;
use frontend\widgets\ErrorWidget;
use yii\helpers\Url;

foreach ($about as $p):
endforeach;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
        <div class="rs-breadcrumbs sec-color">
            <div class="breadcrumbs-image">
                <img src="/images/about.jpg" alt="Breadcrumbs Image">
                <div class="breadcrumbs-inner">
                    <div class="container">
                        <div class="breadcrumbs-text">
                            <h1 class="breadcrumbs-title"><?= Yii::t('app', 'About MEDIN') ?></h1>
                            <ul class="breadcrumbs-subtitle">
                                <li><a href="<?= Url::to(['site/index']) ?>"><i class="fa fa-home"></i> <?= Yii::t('app', 'Home') ?></a></li>
                                <li><?= Yii::t('app', 'About MEDIN') ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section id="rs-about" class="rs-about me-about sec-color pt-94">

            <div class="container">
                <div class="row rs-vertical-bottom">
                    <div class="col-lg-6 col-md-12 " style="margin-bottom: 100px;">
                        <div class="sec-title extra-none">
                            <p>MEDIN</p>
                        </div>
                        <div class="about-text">
                            <p><?= $p->content_1 ?></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="about-img">
                            <img style="width: 100%; height: 400px;" src="<?= $p->getImageFileUrl('photo') ?>" alt=" About Image">
                        </div>
                    </div>
                </div>
            </div>
        </section>

</div>
