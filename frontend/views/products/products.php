<?php

use medin\entities\Catalogs;
use medin\entities\DistributorsAndLinks;
use medin\entities\Products;
use medin\helpers\LanguageHelper;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/**
 * @var $products Products
 * @var $littlecatalogs1 Catalogs
 * @var $catalogs Catalogs
 * @var $id Catalogs
 * @var $distributors_and_links DistributorsAndLinks
 * @var $pages Pagination
 */

//yii\helpers\VarDumper::dump($catalog, 12, true);
//die();

?>
<div class="main-content">
    <div id="rs-team" class="rs-team-inner rs-team-inner-3 pt-100 pb-70">
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <a style=" font-family: fantasy;" href="<?= Url::to(['products/searchproduct', 'price' => 'price', 'id' => $id, 'view' => 'null', 'get' => 'null']) ?>">
                        <button class="btn btn-success"><?= Yii::t('app', 'Price') ?> </button>
                    </a>
                    <a style=" font-family: fantasy;" href="<?= Url::to(['products/searchproduct', 'price' => 'null', 'id' => $id, 'view' => 'view', 'get' => 'null']) ?>">
                        <button class="btn btn-success"><?= Yii::t('app', 'View') ?> </button>
                    </a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#basicExampleModal">
                        <?= Yii::t('app', 'Country') ?>
                    </button>
                    <div class="modal fade" id="basicExampleModal" style="margin-top: 200px;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Country of Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        <li><h5 style=" font-family: fantasy;">
                                                <a href="<?= Url::to(['products/searchproduct', 'price' => 'null', 'id' => $id, 'view' => 'null', 'get' => 'США']) ?>">США</a>
                                            </h5></li>
                                        <li><h5 style=" font-family: fantasy;">
                                                <a href="<?= Url::to(['products/searchproduct', 'price' => 'null', 'id' => $id, 'view' => 'null', 'get' => 'Германия']) ?>">Германия</a>
                                            </h5></li>
                                        <li><h5 style=" font-family: fantasy;">
                                                <a href="<?= Url::to(['products/searchproduct', 'price' => 'null', 'id' => $id, 'view' => 'null', 'get' => 'Япония']) ?>">Япония</a>
                                            </h5></li>
                                        <li><h5 style=" font-family: fantasy;">
                                                <a href="<?= Url::to(['products/searchproduct', 'price' => 'null', 'id' => $id, 'view' => 'null', 'get' => 'Izrail']) ?>">Izrail</a>
                                            </h5></li>
                                        <li><h5> style=" font-family: fantasy;"
                                                <a href="<?= Url::to(['products/searchproduct', 'price' => 'null', 'id' => $id, 'view' => 'null', 'get' => 'Uzbekistan']) ?>">Uzbekistan</a>
                                            </h5></li>
                                        <li><h5 style=" font-family: fantasy;">
                                                <a href="<?= Url::to(['products/searchproduct', 'price' => 'null', 'id' => $id, 'view' => 'null', 'get' => 'Australia']) ?>">Australia</a>
                                            </h5></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="<?= Url::to(['products/searchproducts']) ?>" method="GET">
                            <input name="get" class="input search-input" type="text" placeholder="Name...">
                            <input name="id" class="input search-input" type="hidden" value="<?= $catalogs->id ?>">
                            <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <h2 style=" font-family: fantasy;"><?= LanguageHelper::get($catalogs, 'title') ?></h2>
            <div class="row">
                <?php

                foreach ($products as $product): ?>
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="team-grid">
                            <div class="team-image">
                                <a style=" font-family: fantasy;" href="<?= Url::to(['products/product', 'id' => $product->id]) ?>">
                                    <img src="<?= $product->getImageFileUrl('main_photo') ?>" style="width: 600px; height: 300px;" alt="Team Image">
                                </a>
                            </div>
                            <div class="text-bottom">
                                <h4 style=" font-family: fantasy;" class="person-name"><a href="#"><?= LanguageHelper::get($product, 'title') ?></a></h4>
                                <span class="designation"><?= $product->price ?></span>

                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
            <?php
            echo LinkPager::widget([
                'pagination' => $pages,
            ]);
            ?>
        </div>
    </div>
</div>