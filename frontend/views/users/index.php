<?php


use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],



'pazh_id',
'user_username',
//'access_token',
//'user_auth_key',
//'password_reset_token',
//'admin_password',
//'user_otp',
'user_phone',
'user_mail',
'national_code',
'user_status',
'user_default_business',
'current_business_id',
'user_fullname',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} ',
                'buttons' => [
                    'view' => function ($url,$model) {

                        $url = \yii\helpers\Url::to(['role_permission' ,'id'=>$model->pazh_id]);


                        //$url = str_replace('view','product_view',$url);

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


//            [
//
//                'attribute' => 'comment_type',
//                'value'=> function($model){
//                    if($model->ticket_id != 0)
//                    {
//                        return 'ticket comment';
//                    }
//                    if($model->order_id != 0)
//                    {
//                        return 'order comment';
//                    }
//                    if($model->product_id != 0)
//                    {
//                        return 'product comment';
//                    }
//                    return 'null';
//                }
//
//            ],

//            [
//                'attribute' => 'username',
//                'value'=> function($modelTest){
//                    return $modelTest->pazh->user_username;
//                }
//            ],
            //'comment_content:ntext',
            //'comment_date',
            //'comment_user_visible',


        ],
    ]); ?>
</div>
