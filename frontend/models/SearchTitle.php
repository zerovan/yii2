<?php

namespace app\models;


use frontend\models\Ticket;
use yii\base\Model;
use \yii\data\ActiveDataProvider;
class SearchTitle extends Ticket
{

    public function rules()
    {
        return[
            [['ticket_subject','ticket_content'],'safe'],
        ];

    }
    public function search($param)
    {
        $query = Ticket::find();
        $provider = new ActiveDataProvider([
            'query' => $query,
        ]);
        if(!(($this->load($param))&& ($this->validate())))
        {
           // echo "here1";
            return $provider;
        }
        $query->andFilterWhere(['like','ticket_subject',$this->ticket_subject])
            ->andFilterWhere(['like','ticket_content',$this->ticket_content]);

        return $provider;
    }
    public function scenarios()
    {
        return Ticket::scenarios();

    }

}

?>