<?php

namespace frontend\controllers;

use medin\entities\Catalogs;
use yii\web\Controller;

/**
 * CatalogsController implements the CRUD actions for Catalogs model.
 */
class CatalogsController extends Controller
{
    /**
     * Creates a new Catalogs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
                'catalogs' => Catalogs::find()->where(['parent_id' => null])->all(),
            ]
        );
    }

    public function actionLittlecatalog($id)
    {
        return $this->render('littlecatalog', [
                'littlecatalogs1' => Catalogs::find()->all(),
                'littlecatalogs2' => Catalogs::find()->where(['id' => $id])->one(),
                'littlecatalogs' => Catalogs::find()->where(['parent_id' => $id])->all(),
            ]
        );
    }
}
