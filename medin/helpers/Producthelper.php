<?php

namespace medin\helpers;

use medin\entities\Products;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Producthelper
{
    public static function statusList()
    {
        return [
            Products::STATUS_WAIT => 'Wait',
            Products::STATUS_ACTIVE => 'Active',
        ];
    }

    public static function statusName($status)
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status)
    {
        switch ($status) {
            case Products::STATUS_WAIT:
                $class = 'label label-default';
                break;
            case Products::STATUS_ACTIVE:
                $class = 'label label-success';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
            'class' => $class,
        ]);
    }

    public static function salestatusList()
    {
        return [
            Products::STATUS_SALE_WAIT => 'Salewait',
            Products::STATUS_SALE_ACTIVE => 'Saleactive',
        ];
    }

    public static function salestatusName($sale_status)
    {
        return ArrayHelper::getValue(self::salestatusList(), $sale_status);
    }

    public static function salestatusLabel($sale_status)
    {
        switch ($sale_status) {
            case Products::STATUS_SALE_WAIT:
                $class = 'label label-default';
                break;
            case Products::STATUS_SALE_ACTIVE:
                $class = 'label label-success';
                break;
            default:
                $class = 'label label-default';
        }
        return Html::tag('span', ArrayHelper::getValue(self::salestatusList(), $sale_status), [
            'class' => $class,
        ]);
    }
}
