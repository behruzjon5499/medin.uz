<?php

/**
 * @var $libraries Library
 * @var $directions Direction
 */

use medin\entities\Direction;
use medin\entities\Library;
use medin\helpers\LanguageHelper;
use yii\helpers\Url;

?>

<section class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs sec-color">
        <div class="breadcrumbs-image">
            <img src="/images/library.jpeg" alt="Breadcrumbs Image">
            <div class="breadcrumbs-inner">
                <div class="container">
                    <div class="breadcrumbs-text">
                        <h1 class="breadcrumbs-title"><?= Yii::t('app', 'Libraries') ?></h1>
                        <ul class="breadcrumbs-subtitle">
                            <li><a href="<?= Url::to(['site/index']) ?>"><i class="fa fa-home"></i> <?= Yii::t('app', 'Home') ?></a></li>
                            <li><?= Yii::t('app', 'Libraries') ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Project Section Start -->
    <div id="rs-portfolio" class="rs-portfolio sec-spacer">
        <div class="container">
            <h2  style=" font-family: fantasy; "><?= Yii::t('app', 'Information of Article') ?></h2>

            <?php foreach ($directions as $direction): ?>
                <h3 style=" font-family: fantasy; "> <?= LanguageHelper::get($direction, 'title') ?></h3>

                <div class="row grid">

                    <?php foreach ($libraries as $library):?>
                        <?php if ($direction->id == $library->direction_id): ?>

                        <div class="col-md-4 col-sm-6 mb-30 grid-item filter1 filter3">
                            <div class="gallery-item popup-inner">
                                <div class="gallery-content">
                                    <a href="<?= Url::to(['library/library', 'id' => $library->id]) ?>">
                                    <img src="<?= $library->getImageFileUrl('photo') ?>" style="height: 300px;" alt=""/>
                                    <div class="">
                                        <div class="contents-here">
                                            <h4 class="title" style="font-family: sans-serif"><a
                                                        href="<?= Url::to(['library/library', 'id' => $library->id]) ?>"> <?= LanguageHelper::get($library, 'title') ?></a>
                                            </h4>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; endforeach; ?>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
    <!-- Project Section End -->
</section>
