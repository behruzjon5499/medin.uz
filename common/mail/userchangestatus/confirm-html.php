<?php

use medin\entities\User\User;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user User */
?>
<div class="password-reset">
    <p>Hello <?= Html::encode($user->username) ?>,</p>

    <p>Congratulations, your account has been <?php if ($user->status == User::STATUS_ACTIVE) {
            echo 'activated';
        } else {
            echo 'waited';
        } ?></p>
</div>
