<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tickets');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Ticket'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    \yii\widgets\Pjax::begin();
     ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $search_model,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ticket_id',
            'pazh_id',
            'business_id',
            'ticket_subject',
            'ticket_content:ntext',
            //'ticket_department',
            //'ticket_status',
            //'ticket_submit_date',
            //'ticket_last_update',
            //'user_visibility',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url,$model) {

                       // $url = \yii\helpers\Url::to(['role_permission' ,'id'=>$model->pazh_id]);


                        //$url = str_replace('view','product_view',$url);

                        if(Yii::$app->user->can('see_ticket_comment'))

                        return Html::a(
                            '<span class="glyphicon glyphicon-user"> </span>',
                            $url);
                    },
//                    'link' => function ($url,$model,$key) {
//                        //die($url);
//                        return Html::a('Action', $url);
//                    },
                ],
            ],
        ],
    ]);
    \yii\widgets\Pjax::end();

    ?>
</div>
