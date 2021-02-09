<?php

/* @var $catalogs Catalogs */

use medin\entities\Catalogs;
use medin\helpers\LanguageHelper;
use yii\helpers\Url;

?>
<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs sec-color">
        <div class="breadcrumbs-image">
            <img src="/images/catalogmain.jpg" alt="Breadcrumbs Image">
            <div class="breadcrumbs-inner">
                <div class="container">
                    <div class="breadcrumbs-text">
                        <h1 style=" font-family: fantasy;" class="breadcrumbs-title"><?= Yii::t('app', 'Catalogs') ?></h1>
                        <ul class="breadcrumbs-subtitle">
                            <li><a href="<?= Url::to(['site/index']) ?>"><i class="fa fa-home"></i> <?= Yii::t('app', 'Home') ?></a></li>
                            <li style=" font-family: fantasy;"><?= Yii::t('app', 'Catalogs') ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Services Start -->
    <section id="rs-services" class="rs-services services-carousel pt-100 pb-220 gray-color">
        <div class="container">
            <div class="sec-title text-left extra-none">
                <h3 style=" font-family: fantasy;"><?= Yii::t('app', 'Catalog of products') ?></h3>
                <p  class="width-80"></p>
            </div>
            <div class="clfeatures">
                <div class="row common-height clearfix">
                    <div class="col-lg-3 col-md-12">
                        <?php foreach ($catalogs as $catalog): ?>
                            <a href="<?= Url::to(['catalogs/littlecatalog', 'id' => $catalog->id]) ?>">
                                <h4 style=" font-family: fantasy;"><?= LanguageHelper::get($catalog, 'title') ?></h4>
                            </a>
                        <?php endforeach; ?>
                    </div>

                    <div class="col-lg-9 col-md-12 mb-md-30 ">
                        <div id="how-we-work" class="how-we-work defult-style sec-spacer" style="padding: 0;">
                            <div class="work-sec-gallery">
                                <div class="row">
                                    <?php foreach ($catalogs as $catalog): ?>
                                        <div class="col-lg-3 col-md-6 mb-30">
                                            <div class="work-column">
                                                <div class="common-box">
                                                    <a style=" font-family: fantasy;" href="<?= Url::to(['catalogs/littlecatalog', 'id' => $catalog->id]) ?>">
                                                        <img src="<?= $catalog->getImageFileUrl('photo') ?>" alt="Work Section Image">
                                                    </a>
                                                </div>
                                                <div class="work-gallery-caption">
                                                    <h4 style=" font-family: fantasy;"><a href="<?= Url::to(['catalogs/littlecatalog', 'id' => $catalog->id]) ?>"><?= LanguageHelper::get($catalog, 'title') ?></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Services End -->
</div>
