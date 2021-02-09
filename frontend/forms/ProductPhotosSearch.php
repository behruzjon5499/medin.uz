<?php

namespace frontend\forms;

use medin\entities\ProductPhotos;
use medin\entities\Products;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProductPhotosSearch represents the model behind the search form of `backend\models\ProductPhotos`.
 */
class ProductPhotosSearch extends ProductPhotos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'sort', 'created_at', 'updated_at'], 'integer'],
            [['photo'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $id = \Yii::$app->user->getId();
        $query = ProductPhotos::find()->JoinWith(['product b'], true, 'INNER JOIN')->where(['b.user_id' => $id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'product_id' => $this->product_id,
            'sort' => $this->sort,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'photo', $this->photo]);

        return $dataProvider;
    }
}
