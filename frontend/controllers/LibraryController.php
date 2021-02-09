<?php

namespace frontend\controllers;

use medin\entities\Direction;
use medin\entities\Library;
use yii\helpers\VarDumper;
use yii\web\Controller;

/**
 * LibraryController implements the CRUD actions for Library model.
 */
class LibraryController extends Controller
{
    /**
     * Creates a new Library model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionIndex()
    {
        $direcions = Direction::find()->all();
        $libraries = Library::find()->all();
        return $this->render('index', [
                'directions' => $direcions,
                'libraries' => $libraries
            ]
        );
    }

    public function actionLibrary($id)
    {
        return $this->render('library', [
                'library' => Library::find()->where(['id' => $id])->all(),
            ]
        );
    }
}
