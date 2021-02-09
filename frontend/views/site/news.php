<?php

/**
 * @var $news \abdualiym\cms\entities\Articles
 */

use abdualiym\cms\helpers\Language;
use yii\helpers\Url;

?>

<section class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs sec-color">
        <div class="breadcrumbs-image">
            <img src="/images/news.jpeg" alt="Breadcrumbs Image" style="width: 100%;">
            <div class="breadcrumbs-inner">
                <div class="container">
                    <div class="breadcrumbs-text">
                        <h1 class="breadcrumbs-title"><?= Yii::t('app', 'News of MEDIN') ?></h1>
                        <ul class="breadcrumbs-subtitle">
                            <li><a href="<?= Url::to(['site/index']) ?>"><i class="fa fa-home"></i> <?= Yii::t('app', 'Home') ?></a></li>
                            <li><?= Yii::t('app', 'News of MEDIN') ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="how-we-work defult-style pt-100 pb-100">
        <div class="container">
            <div class="work-sec-gallery">
                <div class="row">
                    <?php foreach ($news as $new): ?>
                        <div class="col-lg-4 col-md-6 hidden-md">
                            <div class="work-column">
                                <div class="common-box">
                                    <h3 ><?= Language::getAttribute($new, 'title', Yii::$app->language) ?></h3>
                                    <img src="<?= $new->getImageFileUrl('photo') ?>" alt="">
                                </div>
                                <div class="work-gallery-caption">
                                    <h4><?= date('F d, Y', $new->date) ?></h4>
                                    <p>
                                        <?= Language::getAttribute($new, 'content', Yii::$app->language) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Project Section End -->
</section>
