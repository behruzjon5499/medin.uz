<?php

namespace frontend\controllers;

use medin\entities\Catalogs;
use medin\entities\Distributors;
use medin\entities\ProductPhotos;
use medin\entities\Products;
use yii\data\Pagination;
use yii\helpers\VarDumper;
use yii\web\Controller;

class ProductsController extends Controller
{

    public function actionSearchproducts($get, $id)
    {
        $query = Products::find()
            ->orFilterWhere(['like', 'title_ru', $get])
            ->orFilterWhere(['like', 'title_en', $get])
            ->orFilterWhere(['like', 'title_ru', $get]);

        $query1 = Products::find()
            ->orFilterWhere(['like', 'title_ru', $get])
            ->orFilterWhere(['like', 'title_en', $get])
            ->orFilterWhere(['like', 'title_ru', $get])->one();
        $count = $query->count();
        $pages = new Pagination(['totalCount' => $count, 'pageSize' => 8]);
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $catalogs = Catalogs::find()->where(['id' => $id])->one();
        return $this->render('products', [
            'id' => $id,
            'products' => $products,
            'catalogs' => $catalogs,
            'pages' => $pages,
        ]);
    }

    public function actionSearchproduct($price, $id, $view, $get)
    {
        if (!($price == 'null')) {
            $query = Products::find()->orderBy(['price' => SORT_DESC])->where(['catalog_id' => $id]);
        } else if (!($view == 'null')) {
            $query = Products::find()->orderBy(['view' => SORT_DESC])->where(['catalog_id' => $id]);
        } else if (!($get == 'null')) {
            $query = Products::find()->innerJoinWith('distributor', 'Products.distributor_id = Distributors.id')
                ->orFilterWhere(['like', 'address', $get]);
        }
        else{
            $query = Products::find()->where(['catalog_id' => $id]);
        }
        $count = $query->count();
        $pages = new Pagination(['totalCount' => $count, 'pageSize' => 8]);
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        $catalogs = Catalogs::find()->where(['id' => $id])->one();
        return $this->render('products', [
                'id' => $id,
                'products' => $products,
                'catalogs' => $catalogs,
                'pages' => $pages,
            ]
        );
    }

    public function actionIndex($id)
    {
        $query = Products::find()->where(['catalog_id' => $id]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 8]);
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        $catalogs = Catalogs::find()->where(['id' => $id])->one();
        return $this->render('products', [
                'id' => $id,
                'products' => $products,
                'catalogs' => $catalogs,
                'pages' => $pages,
            ]
        );
    }


    public function actionProduct($id)
    {
        $products = Products::find()->where(['id' => $id])->one();

        $products->view = $products->view + 1;
        $products->save();

        $catalogs = Products::find()->where(['catalog_id' => $products->catalog_id])->all();

        return $this->render('product', [
                'products' => $products,
                'distributor' => Distributors::find()->all(),
                'productPhotos' => ProductPhotos::find()->where(['product_id' => $id])->all(),
                'catalogs' => $catalogs
            ]
        );
    }
}
