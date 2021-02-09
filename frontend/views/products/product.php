<?php
/**
 * @var $productPhotos \medin\entities\ProductPhotos
 * @var $products \medin\entities\Products
 * @var $catalogs \medin\entities\Catalogs
 * @var $distributors_and_links \medin\entities\DistributorsAndLinks
 */

use medin\helpers\LanguageHelper; ?>
<section class="main-content">

    <div id="rs-project-style" class="rs-project-style pt-100 pb-100">
        <div class="container">

            <div class="row">
                <div class="col-lg-7 col-md-12 mb-md-30">
                    <div class="project-desc">
                        <h3 style=" font-family: fantasy; "><?= Yii::t('app', 'Description of Product') ?></h3>

                        <p style=" font-family: fantasy; "><?= LanguageHelper::get($products, 'description') ?></p>

                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="project-img">
                        <img src="<?= $products->getImageFileUrl('main_photo') ?>" alt="Project Image">
                    </div>
                    <div class="ps-informations mb-md-30">
                        <h4 style=" font-family: fantasy; " class="info-title"><?= Yii::t('app', 'Information of Product:') ?></h4>
                        <ul>
                            <li><span style=" font-family: fantasy; "><?= Yii::t('app', 'Title') ?>:  </span><?= LanguageHelper::get($products, 'title') ?></li>
                            <li><span style=" font-family: fantasy; "><?= Yii::t('app', 'Price') ?>:  </span><?= $products->price ?></li>
                            <li><span style=" font-family: fantasy; "><?= Yii::t('app', 'Created At') ?>:  </span><?php echo date('F d, Y', strtotime($products->created_at)) ?></li>
                            <li><span style=" font-family: fantasy; "><?= Yii::t('app', 'View') ?>:  </span><?= $products->view ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="p-style-wrap">
                <h3 style=" font-family: fantasy;" class="p-style-title"><?= Yii::t('app', 'Gallery of Product') ?></h3>
                <div class="row">
                    <?php foreach ($productPhotos as $productPhoto): ?>
                        <div class="col-md-4 col-sm-12 mb-sm-30">
                            <div class="item-grid">
                                <div class="image-icon">
                                    <img src="<?= $productPhoto->getImageFileUrl('photo') ?>" alt="Project Image">
                                    <a class="image-popup" href="<?= $productPhoto->getImageFileUrl('photo') ?>"><i
                                                class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <section id="rs-team" class="rs-defult-team creative-team sec-color sec-spacer" style="padding-top: 30px;">
                <div class="container">
                    <div class="sec-title-2">
                        <h3 style="font-family: fantasy;"><?= Yii::t('app', 'Like this Product') ?><span>MEDIN</span></h3>
                    </div>
                    <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000"
                         data-dots="false" data-nav="false" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false"
                         data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="false"
                         data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="false" data-md-device-dots="false">
                        <!--team item start -->
                        <?php foreach ($catalogs as $catalog): ?>
                            <div class="team-item">
                                <div class="team-img">
                                    <img src="<?= $catalog->getImageFileUrl('main_photo') ?>" style="width: 600px; height: 300px;" alt="team Image"/>
                                </div>
                                <div class="team-content">
                                    <div class="team-info">

                                        <a href="<?= \yii\helpers\Url::to(['products/product', 'id' => $catalog->id]) ?>"><h4 class="title"><?= LanguageHelper::get($catalog, 'title') ?></h4></a>

                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <!-- Team end -->
        </div>
    </div>
</section>
