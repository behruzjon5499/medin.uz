<?php /**
 * @var $distributors Distributors
 * @var $products Products
 * @var $productPhotos ProductPhotos
 * @var $distributors_and_links DistributorsAndLinks
 */

use medin\entities\Distributors;
use medin\entities\DistributorsAndLinks;
use medin\entities\ProductPhotos;
use medin\entities\Products;
use medin\helpers\LanguageHelper;

foreach ($distributors as $distributor):
endforeach;

?>
<section class="main-content">
    <div class="rs-breadcrumbs sec-color">
        <div class="breadcrumbs-image">
            <img src="<?= $distributor->getImageFileUrl('poster') ?>" style="width: 100%; height: 300px;" alt="Breadcrumbs Image">
            <div class="breadcrumbs-inner">
                <div class="container">
                    <div class="breadcrumbs-text">
                        <h1 class="breadcrumbs-title"  style=" font-family: fantasy; ">
                            <li><?= Yii::t('app', 'suppliers') ?></li>
                        </h1>
                        <ul class="breadcrumbs-subtitle">
                            <li  style=" font-family: fantasy; "><a href="<?= \yii\helpers\Url::to(['site/index']) ?>"><i class="fa fa-home"></i> <?= Yii::t('app', 'Home') ?></a></li>
                            <li  style=" font-family: fantasy; "><?= Yii::t('app', 'suppliers') ?> <?= Yii::t('app', 'Gallery') ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="rs-project-style" class="rs-project-style pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 mb-md-30">
                    <div class="project-desc">
                        <h3  style=" font-family: fantasy; ">
                            <li><?= Yii::t('app', 'Description of Distributor') ?></li>
                        </h3>
                        <p style="font-family: sans-serif;">
                            <?= LanguageHelper::get($distributor, 'description') ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 mb-md-30">
                    <div class="ps-informations mb-md-30">
                        <h4 class="info-title">
                            <li  style=" font-family: fantasy; "><?= Yii::t('app', 'Information of Distributors') ?></li>
                        </h4>
                        <ul>
                            <li>
                                <span  style=" font-family: fantasy; "><?= Yii::t('app', 'Title') ?>: </span> <?= LanguageHelper::get($distributor, 'title') ?>
                            </li>
                            <li><span  style=" font-family: fantasy; "><?= Yii::t('app', 'Phone') ?>: </span><?= $distributor->phone ?></li>
                            <li><span  style=" font-family: fantasy; "><?= Yii::t('app', 'Site') ?>: </span><?= $distributor->site ?></li>
                            <li style="display: inline"><span  style=" font-family: fantasy; "><?= Yii::t('app', 'Social networks') ?>: </span> <?php
                                foreach ($distributors_and_links as $link):?>
                                <?php if ($link['distributor_id'] == $distributor->id) { ?>
                            <a style="font-size: 25px; margin: 7px;" href="<?= $link->url ?>"><i class="fa fa-<?= $link->link->title ?>"></i></a></li>
                            <?php } endforeach; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>

            <div class="p-style-wrap">
                <h3 class="p-style-title"  style=" font-family: fantasy; ">
                    <li><?= Yii::t('app', 'Products of this Distributors') ?></li>
                </h3>
                <div class="row">
                    <?php foreach ($productPhotos as $productPhoto): ?>
                        <?php if ($productPhoto->product['user_id'] == $distributor->user_id) { ?>
                            <div class="col-md-4 col-sm-12 mb-sm-30">
                                <div class="item-grid">
                                    <div class="image-icon">
                                        <img src="<?= $productPhoto->getImageFileUrl('photo') ?>"
                                             style="width: 100%; height: 200px;" alt="Project Image">
                                        <a class="image-popup" href="<?= $productPhoto->getImageFileUrl('photo') ?>"><i
                                                    class="fa fa-search"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php } endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
