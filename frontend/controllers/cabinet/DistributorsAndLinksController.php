<?php

namespace frontend\controllers\cabinet;

use frontend\forms\DistributorsAndLinksSearch;
use medin\entities\Distributors;
use medin\entities\DistributorsAndLinks;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

/**
 * DistributorsAndLinksController implements the CRUD actions for DistributorsAndLinks model.
 */
class DistributorsAndLinksController extends Controller
{
    public $layout = 'cabinet';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all DistributorsAndLinks models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DistributorsAndLinksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DistributorsAndLinks model.
     * @param integer $distributor_id
     * @param integer $link_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($distributor_id, $link_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($distributor_id, $link_id),
        ]);
    }

    /**
     * Creates a new DistributorsAndLinks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DistributorsAndLinks();
        $id = \Yii::$app->user->getId();
        $distributor = Distributors::find()->where(['user_id' => $id])->one();
        if ($model->load(Yii::$app->request->post())) {
            $model->distributor_id = $distributor->id;
            $model->save();
            return $this->redirect(['view', 'distributor_id' => $model->distributor_id, 'link_id' => $model->link_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DistributorsAndLinks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $distributor_id
     * @param integer $link_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($distributor_id, $link_id)
    {
        $model = $this->findModel($distributor_id, $link_id);
        $distributor = Distributors::find()->where(['user_id' => Yii::$app->user->id])->one();
        if ($distributor->id != $model->distributor_id) {
            throw new ForbiddenHttpException('Сизга рухсат берилмаган!');
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'distributor_id' => $model->distributor_id, 'link_id' => $model->link_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DistributorsAndLinks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $distributor_id
     * @param integer $link_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($distributor_id, $link_id)
    {
        $model = $this->findModel($distributor_id, $link_id);
        $distributor = Distributors::find()->where(['user_id' => Yii::$app->user->id])->one();
        if ($distributor->id != $model->distributor_id) {
            throw new ForbiddenHttpException('Сизга рухсат берилмаган!');
        }
        $this->findModel($distributor_id, $link_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DistributorsAndLinks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $distributor_id
     * @param integer $link_id
     * @return DistributorsAndLinks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($distributor_id, $link_id)
    {
        if (($model = DistributorsAndLinks::findOne(['distributor_id' => $distributor_id, 'link_id' => $link_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
