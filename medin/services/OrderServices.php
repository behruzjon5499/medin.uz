<?php

namespace medin\services;

use medin\entities\Orders;
use medin\entities\Subscriptions;

class OrderServices
{
    private $orders;
    const STATUS_WAIT = 0;
    const STATUS_ACTIVE = 10;
    const STARTER = 1;
    const PROFESSIONAL = 2;
    const PREMIUM = 3;

    public function order(Subscriptions $subscription)
    {
            if ($subscription->status == self::STATUS_ACTIVE) {
                if ($subscription->tariff_id == self::STARTER) {
                    $orders = Orders::find()->where(['status' => self::STATUS_ACTIVE])->orderBy(['id' => SORT_ASC])->limit($subscription->tariff->order_count)->all();
                }
                if ($subscription->tariff_id == self::PROFESSIONAL) {
                    $orders = Orders::find()->where(['status' => self::STATUS_ACTIVE])->orderBy(['id' => SORT_ASC])->limit($subscription->tariff->order_count)->all();
                }
                if ($subscription->tariff_id == self::PREMIUM) {
                    $orders = Orders::find()->where(['status' => self::STATUS_ACTIVE])->orderBy(['id' => SORT_ASC])->limit($subscription->tariff->order_count)->all();
                }
            } else {
                $orders = Orders::find()->where(['status' => self::STATUS_ACTIVE])->orderBy(['id' => SORT_ASC])->limit(5)->all();
            }

        return $orders;
    }
}
