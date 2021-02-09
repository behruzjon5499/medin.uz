<?php

namespace medin\helpers;

use medin\entities\Subscriptions;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class SubscriptionHelper
{
    public static function statusList()
    {
        return [
            Subscriptions::STATUS_WAIT => 'Wait',
            Subscriptions::STATUS_ACTIVE => 'Active',
        ];
    }

    public static function statusName($status)
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status)
    {
        switch ($status) {
            case Subscriptions::STATUS_WAIT:
                $class = 'label label-default';
                break;
            case Subscriptions::STATUS_ACTIVE:
                $class = 'label label-success';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
            'class' => $class,
        ]);
    }
}
