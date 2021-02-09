<?php

namespace frontend\controllers;

use abdualiym\cms\entities\Articles;
use medin\entities\Catalogs;
use medin\entities\Distributors;
use medin\entities\DistributorsAndLinks;
use medin\entities\Products;
use medin\entities\SliderPhotos;
use medin\entities\Tariffs;
use yii\data\Pagination;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
                'sliderPhotos' => SliderPhotos::find()->with('slider')->all(),
                'distributors' => Distributors::find()->all(),
                'distributors_and_links' => DistributorsAndLinks::find()->with('distributor')->all(),
                'tariffs' => Tariffs::find()->all(),
                'sales' => Products::find()->where(['sale_status' => 1])->all(),
                'catalogs' => Catalogs::find()->where(['parent_id' => null])->all(),
                'news' => Articles::find()->where(['category_id' => 1])->orderBy(['created_at' => SORT_DESC])->limit(3)->all(),
            ]
        );
    }

    public function actionSale($id)
    {
        return $this->render('sale', [
                'products' => Products::find()->where(['id' => $id])->all(),
            ]
        );
    }

    public function actionClient()
    {
        $query = Articles::find()->where(['category_id' => 2]);

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 8]);
        $clients = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('client', [
                'clients' => $clients,
            ]
        );
    }

    public function actionNews()
    {
        $query = Articles::find()->where(['category_id' => 1]);

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 8]);
        $news = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('news', [
                'news' => $news,
            ]
        );
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        $query = Articles::find()->where(['category_id' => 3]);

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 8]);
        $about = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('about', [
                'about' => $about,
            ]
        );
    }

}
