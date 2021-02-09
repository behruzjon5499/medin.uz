<?php

namespace frontend\controllers;

use medin\entities\Orders;
use medin\entities\Subscriptions;
use medin\services\OrderServices;
use yii\web\Controller;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
{
    private $service;

    public function __construct($id, $module, OrderServices $service, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }

    const STATUS_WAIT = 0;
    const STATUS_ACTIVE = 10;

    public function actionIndex()
    {
        $subscription = Subscriptions::find()->where(['user_id' => \Yii::$app->user->getId()])->with('tariff')->one();
        if (isset($subscription)) {
            $orders = $this->service->order($subscription);
        } else {
            $orders = Orders::find()->where(['status' => self::STATUS_ACTIVE])->orderBy(['id' => SORT_ASC])->limit(5)->all();
        }

        return $this->render('index', [
            'ordercount' => Orders::find()->count(),
            'orders' => $orders,
        ]);
    }
}
