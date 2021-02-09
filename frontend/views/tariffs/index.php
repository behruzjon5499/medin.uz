<?php
/**
 * @var $tariffs Tariffs
 * @var $products Products
 * @var $productphotos ProductPhotos
 * @var $distributors_and_links DistributorsAndLinks
 */

use medin\entities\DistributorsAndLinks;
use medin\entities\ProductPhotos;
use medin\entities\Products;
use medin\entities\Tariffs;
use medin\helpers\LanguageHelper;
use yii\helpers\Url;

?>

<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs sec-color">
        <div class="breadcrumbs-image">
            <img src="/images/tariff.jpg" alt="Breadcrumbs Image">
            <div class="breadcrumbs-inner">
                <div class="container">
                    <div class="breadcrumbs-text">
                        <h1 class="breadcrumbs-title"><?= Yii::t('app', 'Tariffs') ?></h1>
                        <ul class="breadcrumbs-subtitle">
                            <li><a href="<?= Url::to(['site/index']) ?>"><i class="fa fa-home"></i> <?= Yii::t('app', 'Home') ?></a></li>
                            <li><?= Yii::t('app', 'Tariffs') ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="rs-about" class="rs-about me-about sec-color pt-94">
        <div class="container">

            <h3> <a href="<?= Url::to(['feedback/create']) ?>"> <?= Yii::t('app', 'contact') ?></a><?= Yii::t('app', ' us to turn on the tariff') ?>  </h3>

            <?php foreach ($tariffs as $tariff): ?>
                <div class="row " >
                    <div class="col-lg-6 col-md-12 pb-100">
                        <div class="sec-title extra-none">
                            <h3><?= LanguageHelper::get($tariff, 'title') ?></h3>
                        </div>
                        <div class="about-text">
                            <span><?= LanguageHelper::get($tariff, 'description') ?></span>
                            <span><?= Yii::t('app', 'number of orders') ?> :<?=$tariff->order_count?></span>
                            <span><?= Yii::t('app', 'number of product') ?>:<?=$tariff->distributor_count?></span>
                        </div>
                    </div>
                    <div class="col-lg-6 hidden-md" style="margin-top: 74px;">
                        <div class="about-img">
                            <img src="<?= $tariff->getImageFileUrl('photo') ?>" alt=" About Image">
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

</div>
