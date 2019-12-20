<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tblimage;

/**
 * TblimageSearch represents the model behind the search form of `app\models\Tblimage`.
 */
class TblimageSearch extends Tblimage
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'resulationw', 'resulationh'], 'integer'],
            [['photocod', 'photopath', 'thumbnailpath', 'created', 'status', 'title', 'comments'], 'safe'],
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
        $query = Tblimage::find();

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
            'resulationw' => $this->resulationw,
            'resulationh' => $this->resulationh,
            'created' => $this->created,
        ]);

        $query->andFilterWhere(['like', 'photocod', $this->photocod])
            ->andFilterWhere(['like', 'photopath', $this->photopath])
            ->andFilterWhere(['like', 'thumbnailpath', $this->thumbnailpath])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'comments', $this->comments]);

        return $dataProvider;
    }
}
