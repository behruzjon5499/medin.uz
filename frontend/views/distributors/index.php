<?php

use backend\forms\DistributorsSearch;
use medin\entities\Distributors;
use medin\entities\DistributorsAndLinks;
use medin\helpers\LanguageHelper;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

/**
 * @var $distributors Distributors
 * @var $pages
 * @var $distributors_and_links DistributorsAndLinks
 * @var $this yii\web\View
 * @var $searchModel DistributorsSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $this yii\web\View
 * @var $model DistributorsSearch
 * @var $form yii\widgets\ActiveForm
 */

foreach ($distributors as $distributor):
endforeach;
?>
<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs sec-color">
        <div class="breadcrumbs-image">
            <img src="/images/distributors.jpg"  alt="Breadcrumbs Image">
            <div class="breadcrumbs-inner">
                <div class="container">
                    <div class="breadcrumbs-text">
                        <h1 class="breadcrumbs-title">
                            <li  style=" font-family: fantasy; "><p style="color:black;"><?= Yii::t('app', 'suppliers') ?></p></li>
                        </h1>
                        <ul class="breadcrumbs-subtitle">
                            <li>
                                <a href="<?= \yii\helpers\Url::to(['site/index']) ?>"><i
                                            class="fa fa-home"></i> <?= Yii::t('app', 'Home') ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs End -->
    <!-- Team Inner Section Start -->
    <div id="rs-team" class="rs-team-inner pt-100 pb-40">
        <div class="container">
            <div class="row" style="margin-bottom: 30px;">
                <div class="col-md-6" style="padding-right: 0;">

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicExampleModal">
                        search
                    </button>
                    <div class="modal fade" id="basicExampleModal" style="margin-top: 200px;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Country of Distributors</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        <li><h5><a href="<?= \yii\helpers\Url::to(['distributors/search', 'get' => 'США']) ?>">США</a></h5></li>
                                        <li><h5><a href="<?= \yii\helpers\Url::to(['distributors/search', 'get' => 'Германия']) ?>">Германия</a></h5></li>
                                        <li><h5><a href="<?= \yii\helpers\Url::to(['distributors/search', 'get' => 'Япония']) ?>">Япония</a></h5></li>
                                        <li><h5><a href="<?= \yii\helpers\Url::to(['distributors/search', 'get' => 'Izrail']) ?>">Izrail</a></h5></li>
                                        <li><h5><a href="<?= \yii\helpers\Url::to(['distributors/search', 'get' => 'Uzbekistan']) ?>">Uzbekistan</a></h5></li>
                                        <li><h5><a href="<?= \yii\helpers\Url::to(['distributors/search', 'get' => 'Australia']) ?>">Australia</a></h5></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($distributors as $distributor): ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                        <div class="team-grid">
                            <div class="team-image">
                                <img src="<?= $distributor->getImageFileUrl('photo') ?>"
                                     style="width: 300px; height: 300px;" alt="Team Image">
                            </div>
                            <div class="text-bottom">
                                <h4 class="person-name"><a href="<?= \yii\helpers\Url::to(['distributors/view', 'id' => $distributor->id]) ?>"><?= LanguageHelper::get($distributor, 'title') ?></a></h4>
                            </div>
                            <div class="team-content">
                                <div class="text-box">
                                    <h4 class="person-name"  style=" font-family: fantasy; "><a
                                                href="<?= \yii\helpers\Url::to(['distributors/view', 'id' => $distributor->id]) ?>"><?= LanguageHelper::get($distributor, 'title') ?></a>
                                        <div class="team-social">
                                            <ul>
                                                <?php
                                                foreach ($distributors_and_links as $link):?>
                                                    <?php if ($link['distributor_id'] == $distributor->id) { ?>
                                                        <li>
                                                        <li><a href="<?= $link->url ?>"><i class="fa fa-<?= $link->link->title ?>"></i></a></li></li>
                                                    <?php } endforeach; ?>
                                            </ul>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php
            Pjax::begin();
            echo LinkPager::widget([
                'pagination' => $pages,
            ]);
            Pjax::end();
            ?>
        </div>
    </div>
</div>




