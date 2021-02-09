<?php

/**
 * @var $clients \abdualiym\cms\entities\Articles
 */

use abdualiym\cms\helpers\Language;
use yii\helpers\Url;

?>

<section class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs sec-color">
        <div class="breadcrumbs-image">
            <img src="/images/client.jpg" alt="Breadcrumbs Image">
            <div class="breadcrumbs-inner">
                <div class="container">
                    <div class="breadcrumbs-text">
                        <h1 class="breadcrumbs-title"><?= Yii::t('app', 'Clients of MEDIN') ?></h1>
                        <ul class="breadcrumbs-subtitle">
                            <li><a href="<?= Url::to(['site/index']) ?>"><i class="fa fa-home"></i> <?= Yii::t('app', 'Home') ?></a></li>
                            <li><?= Yii::t('app', 'Clients of MEDIN') ?></li>
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
                    <?php foreach ($clients as $client): ?>
                        <div class="col-lg-4 col-md-6 hidden-md">
                            <div class="work-column">
                                <div class="common-box">
                                    <img src="<?= $client->getImageFileUrl('photo') ?>" alt="">
                                </div>
                                <div class="work-gallery-caption">
                                    <h4>
                                        <a href="#"><?= Language::getAttribute($client, 'title', Yii::$app->language) ?></a>
                                    </h4>
                                    <p>
                                        <?= Language::getAttribute($client, 'content', Yii::$app->language) ?>
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
