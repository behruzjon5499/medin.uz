<?php

use yii\helpers\Url;

?>
<footer id="rs-footer" class="rs-footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 mb-md-30">
                    <div class="about-widget">
                        <a href="<?= Url::to(['site/index']) ?>">
                            <img src="/images/logoo.png" alt="Footer Logo">
                        </a>
                        <ul class="footer-address">
                            <li><i class="fa fa-map-marker"></i><a href="#">Hepta pro, New Yourk, NY 254</a></li>
                            <li><i class="fa fa-phone"></i><a href="#">123-456-789</a></li>
                            <li><i class="fa fa-envelope-o"></i><a href="#">info@yourdmain.com </a></li>
                            <li><i class="fa fa-clock-o"></i>
                                <p class="mb-0">Opening Hours: 8.30 AM – 7.00 PM</p></li>
                        </ul>
                        <ul class="social-links">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 mb-md-30">
                    <h5 class="footer-title"><?= Yii::t('app', 'RECENT POSTS')?></h5>
                    <div class="recent-post-widget">
                        <div class="post-item mb-30">
                            <div class="post-image">
                                <img src="/images/blog/1.jpg" alt="post image">
                            </div>
                            <div class="post-desc">
                                <a href="#">Business Needs Customers</a>
                                <span><i class="fa fa-calendar"></i> August 7, 2018 </span>
                            </div>
                        </div>

                        <div class="post-item mb-30">
                            <div class="post-image">
                                <img src="/images/blog/2.jpg" alt="post image">
                            </div>
                            <div class="post-desc">
                                <a href="#"> Business Structured </a>
                                <span><i class="fa fa-calendar"></i> August 7, 2018 </span>
                            </div>
                        </div>

                        <div class="post-item">
                            <div class="post-image">
                                <img src="/images/blog/3.jpg" alt="post image">
                            </div>
                            <div class="post-desc">
                                <a href="#"> Small Business Trends </a>
                                <span><i class="fa fa-calendar"></i> August 7, 2018 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <h5 class="footer-title"><?= Yii::t('app', 'Newsletter')?></h5>
                    <!-- Newsletter Start -->
                    <div class="news-info">
                        <p class="news-note white-color">We create WordPress Theme for more than three years. Our team
                            goal to make beautiful theme without bug and optimize.</p>
                    </div>
                    <form class="news-form footer-form">
                        <input type="text" class="form-input" placeholder="<?= Yii::t('app', 'Enter Your Email')?>">
                        <button type="submit" class="form-button">
                            <i class="fa fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="ft-bottom-right">
                <div class="footer-bottom-share">
                    <ul>
                        <li class="active"><a href="<?= Url::to(['site/index']) ?>"><?= Yii::t('app', 'Home') ?></a></li>
                        <li><a href="<?= Url::to(['site/about']) ?>"><?= Yii::t('app', 'About') ?></a></li>
                        <li><a href="<?= Url::to(['services/index']) ?>"><?= Yii::t('app', 'Services') ?></a></li>
                        <li><a href="<?= Url::to(['/blog'])?>"><?= Yii::t('app', 'Blog') ?></a></li>
                        <li><a href="<?= Url::to(['feedback/create']) ?>"><?= Yii::t('app', 'Contacts') ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
