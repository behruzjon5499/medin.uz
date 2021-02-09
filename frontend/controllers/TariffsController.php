<?php

namespace frontend\controllers;

use medin\entities\Tariffs;
use yii\web\Controller;

class TariffsController extends Controller
{
    /**
     * Creates a new Tariffs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
                'tariffs' => Tariffs::find()->all(),
            ]
        );
    }
}
