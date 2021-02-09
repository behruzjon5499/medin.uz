<?php

use abdualiym\cms\helpers\Language;
use medin\entities\Catalogs;
use medin\entities\Distributors;
use medin\entities\DistributorsAndLinks;
use medin\entities\Products;
use medin\entities\SliderPhotos;
use medin\entities\Tariffs;
use medin\helpers\LanguageHelper;

/**
 * @var $sliderPhotos SliderPhotos
 * @var $distributors Distributors
 * @var $tariffs Tariffs
 * @var $sales Products
 * @var $distributors_and_links DistributorsAndLinks
 * @var $news \abdualiym\cms\entities\Articles
 * @var $catalogs Catalogs
 */

$this->title = Yii::t('app', 'Medin.uz - Medical portal');

?>


<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_one"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_three"></div>
            <div class="object" id="object_four"></div>
        </div>
    </div>
</div>
<div class="main-content">
    <!-- Slider Start -->
    <div id="rs-slider" class="rs-slider rs-slider-one">
        <div class="bend niceties">
            <div id="nivoSlider" class="slides">
                <?php
                foreach ($sliderPhotos as $slider_photo):
                    ?>
                    <img src="<?= $slider_photo->getImageFileUrl('photo') ?>" alt="" title="#<?= $slider_photo->id ?>"/>
                <?php endforeach; ?>
            </div>

            <?php
            foreach ($sliderPhotos as $slider_photo):?>
                <div id="<?= $slider_photo->id ?>" class="slider-direction">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <div class="container">
                                <div class="slider-des">
                                    <h3 class="sl-sub-title"><?= LanguageHelper::get($slider_photo->slider, 'title') ?></h3>
                                    <h1 class="sl-title"></h1>
                                    <div class="sl-desc margin-0">
                                        <?= LanguageHelper::get($slider_photo->slider, 'description') ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
    <!-- Slider End -->


    <!-- Portfolio Start -->
    <section id="rs-portfolio2" class="rs-portfolio2 defutl-style sec-spacer">
        <div class="container">
            <div class="sec-title">
                <h3 style="font-family: cursive; " ><?= Yii::t('app', 'Our Tariffs') ?></h3>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="20" data-autoplay="true" data-autoplay-timeout="5000"
                         data-smart-speed="2000"
                         data-dots="false" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="false"
                         data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="true"
                         data-ipad-device-dots2="false"
                         data-md-device="3" data-md-device-nav="true" data-md-device-dots="false">
                        <?php foreach ($tariffs as $tariff): ?>

                            <div class="portfolio-item">
                                <div class="portfolio-img">
                                    <img src="<?= $tariff->getImageFileUrl('photo') ?>" style="height: 200px;" alt="Portfolio Image"/>
                                </div>
                                <div class="portfolio-content">
                                    <div class="display-table">
                                        <div class="display-table-cell">
                                            <h4 class="p-title"><a href="<?= \yii\helpers\Url::to(['tariffs/index']) ?>"><?= LanguageHelper::get($tariff, 'title') ?></a>
                                            </h4>
                                            <a href="<?= \yii\helpers\Url::to(['tariffs/index']) ?>" class="project-btn"><?= Yii::t('app', 'Read More') ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio End -->

    <!-- Expertise Area satar -->
    <div class="why-choose-us defult-style sec-color pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-md-50">
                    <div class="video-section-area">
                        <div class="image-here">
                            <img src="/images/news.jpg" alt="">
                            <div class="video-icon-here">
                                <a class="popup-videos animated pulse" href="https://www.youtube.com/watch?v=YLN1Argi7ik" title="Video Icon">
                                    <span></span>
                                </a>
                            </div>
                        </div>
                        <div class="overly-border"></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 services-responsibiity">
                    <div class="service-res-inner">
                        <div class="sec-title">
                            <h3 style="font-family: cursive; " ><?= Yii::t('app', 'News of MEDIN') ?></h3>
                        </div>
                        <?php foreach ($news as $new): ?>
                            <div class="services-item">
                                <div class="service-mid-icon">
                                    <a href="<?= \yii\helpers\Url::to(['site/news']) ?>"><span class="service-mid-icon-container"><i data-icon="a" class="icon"></i></span></a>
                                </div>
                                <div class="services-desc">
                                    <h3 class="services-title"><a href="<?= \yii\helpers\Url::to(['site/news']) ?>"><?= Language::getAttribute($new, 'title') ?></a></h3>
                                    <p><?= \yii\helpers\StringHelper::truncate(Language::getAttribute($new, 'content'), 150, '...'); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Expertise Area end -->

    <!-- Team Start -->
    <section id="rs-team" class="rs-defult-team defult-style sec-spacer">
        <!-- Counter Up Section Start Here-->
        <div class="counter-top-area defult-style">
            <div class="container">
                <div class="row rs-count">
                    <!-- COUNTER-LIST START -->
                    <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-duration=".3s" data-wow-delay="300ms">
                        <div class="rs-counter-list">
                            <i data-icon="W" class="icon"></i>
                            <h3 class="rs-counter">5000</h3>
                            <h4>Happy Client</h4>
                        </div>
                    </div>
                    <!-- COUNTER-LIST END -->

                    <!-- COUNTER-LIST START -->
                    <div class="col-md-3 col-sm-6  wow fadeInUp" data-wow-duration=".7s" data-wow-delay="300ms">
                        <div class="rs-counter-list">
                            <i data-icon="C" class="icon"></i>
                            <h3 class="rs-counter">5058</h3>
                            <h4>Project Done </h4>
                        </div>
                    </div>
                    <!-- COUNTER-LIST END -->

                    <!-- COUNTER-LIST START -->
                    <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-duration=".9s" data-wow-delay="300ms">
                        <div class="rs-counter-list">
                            <i data-icon="P" class="icon"></i>
                            <h3 class="rs-counter">3890</h3>
                            <h4>Awards Won</h4>
                        </div>
                    </div>
                    <!-- COUNTER-LIST END -->

                    <!-- COUNTER-LIST START -->
                    <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="1.2s" data-wow-delay="300ms">
                        <div class="rs-counter-list">
                            <i data-icon="&#xe001;" class="icon"></i>
                            <h3 class="rs-counter">0025</h3>
                            <h4 class="last">Experience Year</h4>
                        </div>
                    </div>
                    <!-- COUNTER-LIST END -->
                </div>
            </div>
        </div>
        <!-- Counter Down Section End Here-->
        <div class="container">
            <div class="sec-title">
                <h3 style="font-family: cursive; " ><?= Yii::t('app', 'Our Distributors') ?></h3>
            </div>
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000"
                 data-smart-speed="2000"
                 data-dots="false" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="false"
                 data-ipad-device="2"
                 data-ipad-device-nav="true" data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="true" data-ipad-device-dots2="false"
                 data-md-device="3"
                 data-md-device-nav="true" data-md-device-dots="false">
                <?php foreach ($distributors as $distributor) : ?>
                    <div class="team-item">
                        <div class="team-overlay">
                            <div class="team-img">
                                <img src="<?= $distributor->getImageFileUrl('photo') ?>" style="height: 240px;" alt="team Image"/>
                            </div>
                            <div class="team-content">
                                <ul class="team-social">
                                    <?php
                                    foreach ($distributors_and_links as $link):?>
                                        <?php if ($link['distributor_id'] == $distributor->id) { ?>
                                            <li><a href="<?= $link->url ?>"><i class="fa fa-<?= $link->link->title ?>"></i></a></li>
                                        <?php } endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="team-info">
                            <a href="<?= \yii\helpers\Url::to(['distributors/view', 'id' => $distributor->id]) ?>"><h4 class="title"><?= $distributor->title_ru ?></h4>
                            </a>
                            <span class="post"><?= $distributor->address ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Team end -->


    <!-- Blog Start -->
    <section id="rs-blog" class="rs-blog sec-spacer">
        <div class="container">
            <div class="sec-title">
                <h3 style="font-family: cursive; " ><?= Yii::t('app', 'Catalogs') ?></h3>
            </div>
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000"
                 data-smart-speed="2000"
                 data-dots="false" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="false"
                 data-ipad-device="2"
                 data-ipad-device-nav="true" data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="true" data-ipad-device-dots2="false"
                 data-md-device="3"
                 data-md-device-nav="true" data-md-device-dots="false">

                <?php foreach ($catalogs as $catalog): ?>
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="<?= $catalog->getImageFileUrl('photo') ?>" style="width: 100%; height: 300px;" alt="Blog Image">
                            <div class="blog-img-content">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <a class="blog-link" href="<?= \yii\helpers\Url::to(['catalogs/littlecatalog', 'id' => $catalog->id]) ?>" title="Blog Link">
                                            <i class="fa fa-link"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-wrapper">

                            <div class="blog-desc">
                                <a href="#"><?= LanguageHelper::get($catalog, 'title') ?></a>
                                <p> <?= \yii\helpers\StringHelper::truncate(LanguageHelper::get($catalog, 'description'), 150, '...'); ?></p>
                            </div>
                            <a href="<?= \yii\helpers\Url::to(['catalogs/littlecatalog', 'id' => $catalog->id]) ?>" class="readon"><?= Yii::t('app', 'Read More') ?></a>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </section>
    <!-- Blog End -->
</div>
