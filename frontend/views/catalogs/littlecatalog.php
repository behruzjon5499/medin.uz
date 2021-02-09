<?php

/**
 * @var $littlecatalogs Catalogs
 * @var $littlecatalogs1 Catalogs
 * @var $littlecatalogs2 Catalogs
 * @var $distributors_and_links DistributorsAndLinks
 */

use medin\entities\Catalogs;
use medin\entities\DistributorsAndLinks;
use medin\helpers\LanguageHelper;
use yii\helpers\Url;

foreach ($littlecatalogs as $littlecatalog):
endforeach;

?>
<section class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs sec-color">
        <div class="breadcrumbs-image">
            <img src="<?= $littlecatalogs2->getImageFileUrl('photo') ?>" style="width: 1920px; height: 380px;"
                 alt="Breadcrumbs Image">
            <div class="breadcrumbs-inner">
                <div class="container">
                    <div class="breadcrumbs-text">
                        <h1 style=" font-family: fantasy;" class="breadcrumbs-title"><?= Yii::t('app', 'Catalogs') ?></h1>
                        <ul  class="breadcrumbs-subtitle">
                            <li style=" font-family: fantasy;"><a href="<?= Url::to(['site/index']) ?>"><i class="fa fa-home"></i> <?= Yii::t('app', 'Home') ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="rs-portfolio" class="rs-portfolio sec-spacer">
        <div class="container">
            <div class="gridFilter">
                <h3 style=" font-family: fantasy;"><?= Yii::t('app', 'Catalog of products') ?></h3>
            </div>
            <?php foreach ($littlecatalogs as $littlecatalog): ?>
                <h4 style=" font-family: fantasy;"><?= LanguageHelper::get($littlecatalog, 'title') ?></h4>
                <div class="row grid">
                    <?php foreach ($littlecatalogs1 as $littlecatalog1): ?>
                        <?php if ($littlecatalog->id == $littlecatalog1->parent_id): ?>
                            <div class="col-lg-3 col-md-6 col-sm-12 mb-30 grid-item filter2 filter3">
                                <div class="gallery-item popup-inner">
                                    <div class="gallery-content">
                                        <img src="<?= $littlecatalog1->getImageFileUrl('photo') ?>" alt=""/>
                                        <div class="popup-text">
                                            <div class="contents-here">
                                                <h4 style=" font-family: fantasy;" class="title"><a
                                                            href="<?= Url::to(['products/index', 'id' => $littlecatalog1->id]) ?>"><?= LanguageHelper::get($littlecatalog1, 'title') ?></a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif;
                    endforeach;
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
