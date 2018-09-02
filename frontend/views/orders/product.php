<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create product', ['create_product'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([


        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

                'product_id',
                'product_name',
                'product_code',
               // 'product_barcode',
                'product_status',
               // 'product_description',
                'product_taxonomy_id',
                'product_published_date',
                //'product_modified_date',
                'product_language',
                //'product_slug',
                'business_id',
                'product_en_name',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete} {link}',
            'buttons' => [
                                'view' => function ($url,$model) {

                                    $url = \yii\helpers\Url::to(['product_view' ,'id'=>$model->product_id]);


                                    //$url = str_replace('view','product_view',$url);

                                    return Html::a(
                                        '<span class="glyphicon glyphicon-eye-open"></span>',
                                        $url);
                                },
                                'link' => function ($url,$model,$key) {
                                    //die($url);
                                    return Html::a('Action', $url);
                                },
                         ],
            ],
        ],
    ]); ?>
</div>
