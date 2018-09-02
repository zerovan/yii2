<?php


use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Comment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'pazh.user_username',
//            'comment_id',
//            'order_id',
//            'product_id',
//            'ticket_id',
            'pazh_id',
            'comment_content',
            [

              'attribute' => 'comment_type',
                'value'=> function($model){
                    if($model->ticket_id != 0)
                    {
                        return 'ticket comment';
                    }
                    if($model->order_id != 0)
                    {
                        return 'order comment';
                    }
                    if($model->product_id != 0)
                    {
                        return 'product comment';
                    }
                    return 'null';
                }

            ],

            [
                'attribute' => 'username',
                'value'=> function($modelTest){
                    return $modelTest->pazh->user_username;
                }
            ],
            //'comment_content:ntext',
            //'comment_date',
            //'comment_user_visible',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
