<nav class="right_menu_togle">
    <div class="close-btn"><span id="nav-close" class="text-center"><i class="fa fa-close"></i></span></div>
    <div class="canvas-logo">
        <a href="<?= \yii\helpers\Url::to(['site/index']) ?>"><img src="/images/logoo.png" alt="logo"></a>
    </div>
    <ul class="sidebarnav_menu list-unstyled main-menu">
        <!--Home Menu Start-->
        <li><a href="<?= \yii\helpers\Url::to(['site/index']) ?>"><?= Yii::t('app', 'Home') ?></a></li>
        <!--Home Menu End-->

        <!--About Menu Start-->
        <li><a href="<?= \yii\helpers\Url::to(['site/about']) ?>"><?= Yii::t('app', 'About') ?></a></li>
        <!--About Menu End-->

        <!--Services Menu Start-->
        <li><a href="<?= \yii\helpers\Url::to(['site/client']) ?>"><?= Yii::t('app', 'Clients') ?></a></li>
        <!--Services Menu End-->
        <li><a href="<?= \yii\helpers\Url::to(['site/news']) ?>"><?= Yii::t('app', 'News') ?></a></li>
        <!--Blog Menu Star-->
<!--        <li><a href="№">--><?//= Yii::t('app', 'Blog') ?><!--</a></li>-->
        <!--Blog Menu End-->
    </ul>
    <div class="canvas-contact">
        <h5 class="canvas-contact-title"><?= Yii::t('app', 'Contact Info') ?></h5>
        <ul class="contact">
            <li><i class="fa fa-globe"></i>Tikkatuli Road, New York, USA</li>
            <li><i class="fa fa-phone"></i>+123445789</li>
            <li><i class="fa fa-envelope"></i><a href="mailto:info@yourcompany.com">info@yourcompany.com</a></li>
            <li><i class="fa fa-clock-o"></i>10:00 AM - 11:30 PM</li>
        </ul>
        <ul class="social">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
        </ul>
    </div>
</nav>
