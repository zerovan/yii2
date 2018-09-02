<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\File;

/**
 * searchFile represents the model behind the search form of `frontend\models\File`.
 */
class searchFile extends File
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['en_name', 'fa_name', 'date_time', 'teacher', 'tag'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = File::find();

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
            'date_time' => $this->date_time,
        ]);

        $query->andFilterWhere(['like', 'en_name', $this->en_name])
            ->andFilterWhere(['like', 'fa_name', $this->fa_name])
            ->andFilterWhere(['like', 'teacher', $this->teacher])
            ->andFilterWhere(['like', 'tag', $this->tag]);

        return $dataProvider;
    }
}
