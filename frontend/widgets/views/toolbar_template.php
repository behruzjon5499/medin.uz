<?php

use frontend\widgets\LanguagesWidget;
use yii\helpers\Html;

?>
<div class="toolbar-area hidden-md">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="toolbar-contact">
                    <ul>
                        <li><i class="fa fa-envelope-o"></i><a href="mailto:info@yourwebsite.com">info@yourwebsite.com</a>
                        </li>

                        <li><i class="fa fa-phone"></i><a href="tel:+123456789">(+123) 456789</a></li>


                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="toolbar-sl-share">
                    <ul>
                        <?php if (Yii::$app->user->isGuest) {
                            echo '<li style="width: 120px">' . Html::a(Yii::t('app', 'Sign Up'), ['/signup']) . '</li>';
                            echo '<li>' . Html::a(Yii::t('app', 'Login'), ['/login']) . '</li>';
                        } else {
                            echo '<li style="width: 100px;">'
                                . Html::a(Yii::t('app', 'Cabinet'), ['/cabinet'])
                                . '</li>';
                            echo '<li style="width: 100px;">'
                                . Html::a(Yii::t('app', 'Logout') . '(' . Yii::$app->user->getId() . ')', ['/logout'])
                                . '</li>';
                        } ?>
                        <?= LanguagesWidget::widget()?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
