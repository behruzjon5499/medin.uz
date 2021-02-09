<?php

/**
 * @var $products Products
 */

use medin\entities\Products;
use yii\helpers\StringHelper;
use yii\helpers\Url;

?>

<div id="how-we-work" class="how-we-work defult-style sec-spacer">
    <div class="container">
        <div class="sec-title">
            <h3>Специальные предложения и акции</h3>
        </div>
        <div class="work-sec-gallery">
            <div class="row">
                <?php foreach ($products as $product): ?>
                    <div class="col-lg-4 col-md-6 mb-md-30">
                        <div class="work-column">
                            <div class="common-box">
                                <img src="<?= $product->getImageFileUrl('main_photo') ?>" alt="Work Section Image">
                            </div>
                            <div class="work-gallery-caption">
                                <h4><a href="<?= Url::to(['site/product', 'id' => $product->id]) ?>"><?= $product->title_ru ?></a></h4>
                                <p><?= StringHelper::truncate($product->description_ru, 150, '...'); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
