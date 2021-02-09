<?php

namespace medin\helpers;

use medin\entities\Services;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class ServicesHelper
{
    public static function statusList()
    {
        return [
            Services::STATUS_WAIT => 'Wait',
            Services::STATUS_ACTIVE => 'Active',
        ];
    }

    public static function statusName($status)
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status)
    {
        switch ($status) {
            case Services::STATUS_WAIT:
                $class = 'label label-default';
                break;
            case Services::STATUS_ACTIVE:
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
