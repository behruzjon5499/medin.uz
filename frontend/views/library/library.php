<?php

/**
 * @var $library Library
 */

use medin\entities\Library;
use medin\helpers\LanguageHelper;

?>

<section class="main-content">

    <?php foreach ($library as $librar): ?>
        <div id="rs-project-style" class="rs-project-style pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 mb-md-30">
                        <div class="project-desc">
                            <h3  style=" font-family: fantasy; "> <?= Yii::t('app', 'Description of Article') ?></h3>
                            <p  style=" font-family: fantasy; "><?= LanguageHelper::get($librar, 'description') ?></p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="project-img">
                            <img src="<?= $librar->getImageFileUrl('photo') ?>" alt="Project Image">
                        </div>
                        <div class="ps-informations">
                            <h4 class="info-title"  style=" font-family: fantasy; "><?= Yii::t('app', 'Information of Article') ?></h4>
                            <ul>
                                <li><span  style=" font-family: fantasy; "><?= Yii::t('app', 'Title') ?>: </span><?= LanguageHelper::get($librar, 'title') ?></li>
                                <li><span  style=" font-family: fantasy; "> <?= Yii::t('app', 'Created At') ?>:  </span><?php echo date('F d, Y', $librar->created_at) ?></li>
                                <li><span  style=" font-family: fantasy; "><?= Yii::t('app', 'file') ?>: </span> <a href="<?= $librar->getImageFileUrl('file') ?>" download><img
                                                style="width: 25px; height: 25px;" src="/images/download.png" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>
