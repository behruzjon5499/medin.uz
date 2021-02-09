<?php
/* @var $this yii\web\View */

/* @var $user User */

use medin\entities\User\User; ?>
Hello <?= $user->username ?>,

Congratulations, your account has been <?php if ($user->status == User::STATUS_ACTIVE) {
    echo 'activated';
} else {
    echo 'waited';
} ?>
