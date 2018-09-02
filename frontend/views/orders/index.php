<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Orders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'order_id',
            'pazh_id',
            'order_date',
            'order_modified_date',
            'order_status',
            'order_post_code',
            'order_address:ntext',
            'order_post_method',
            'order_post_time',
            'order_export_code',
            'order_del',
            'order_lock',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
