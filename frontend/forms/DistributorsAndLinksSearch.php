<?php

namespace frontend\forms;

use medin\entities\DistributorsAndLinks;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;

/**
 * DistributorsAndLinksSearch represents the model behind the search form of `backend\models\DistributorsAndLinks`.
 */
class DistributorsAndLinksSearch extends DistributorsAndLinks
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['distributor_id', 'link_id'], 'integer'],
            [['url'], 'safe'],
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
        $query = DistributorsAndLinks::find()->JoinWith(['distributor b'], true, 'INNER JOIN')->where(['b.user_id' => $id]);
        // add conditions that should always apply here

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
            'distributor_id' => $this->distributor_id,
            'link_id' => $this->link_id,
        ]);

        $query->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
