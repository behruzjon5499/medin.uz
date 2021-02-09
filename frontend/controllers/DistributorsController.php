<?php

namespace frontend\controllers;

use medin\entities\Distributors;
use medin\entities\DistributorsAndLinks;
use medin\entities\ProductPhotos;
use yii\data\Pagination;
use yii\web\Controller;

class DistributorsController extends Controller
{

    public function actionIndex()
    {
        $query = Distributors::find();

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 6]);
        $distributors = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $distributors_and_links = DistributorsAndLinks::find()->with('distributor')->all();
        return $this->render('index', [
                'distributors' => $distributors,
                'distributors_and_links' => $distributors_and_links,
                'pages' => $pages,
            ]
        );
    }

    public function actionSearch($get)
    {
        $query = Distributors::find()
            ->orFilterWhere(['like', 'address', $get])
            ->orFilterWhere(['like', 'title_ru', $get]);

        $distributors_and_links = DistributorsAndLinks::find()->with('distributor')->all();
        $count = $query->count();
        $pages = new Pagination(['totalCount' => $count, 'pageSize' => 8]);
        $distributors = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'pages' => $pages,
            'distributors' => $distributors,
            'distributors_and_links' => $distributors_and_links,
        ]);
    }

    public function actionView($id)
    {
        if (!$id) {
            return $this->goHome();
        }
        return $this->render('view', [
                'distributors' => Distributors::find()->where(['id' => $id])->all(),
                'distributors_and_links' => DistributorsAndLinks::find()->with('distributor')->all(),
                'productPhotos' => ProductPhotos::find()->with('product')->all(),
            ]
        );
    }

}
