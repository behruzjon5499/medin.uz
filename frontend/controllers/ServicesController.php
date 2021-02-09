<?php

namespace frontend\controllers;

use medin\entities\Services;
use Yii;
use yii\helpers\VarDumper;
use yii\web\Controller;

class ServicesController extends Controller
{

    const STATUS_WAIT = 0;
    const STATUS_ACTIVE = 10;
    /**
     * Creates a new Services model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionIndex()
    {
        $services = Services::find()->where(['status' => self::STATUS_ACTIVE])->all();
        return $this->render('index', [
            'services' => $services,
        ]);

    }

    public function actionCreate()
    {
        $model = new Services();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Your request has been successfully delivered'));
            return $this->redirect(['../services/index', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}
