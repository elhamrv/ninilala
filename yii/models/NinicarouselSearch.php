<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ninicarousel;

/**
 * NinicarouselSearch represents the model behind the search form of `app\models\Ninicarousel`.
 */
class NinicarouselSearch extends Ninicarousel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'imageid'], 'integer'],
            [['title', 'comment', 'url', 'status'], 'safe'],
            [['priority'], 'number'],
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
        $query = Ninicarousel::find();

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
            'id' => $this->id,
            'imageid' => $this->imageid,
            'priority' => $this->priority,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
