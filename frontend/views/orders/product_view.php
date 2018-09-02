<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Orders */

$this->title = $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Product', 'url' => ['product']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->product_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        ],
    ]) ?>

    <?php

    $comments = $model->select_comment_by_product_id($model->product_id);

    foreach( $comments as $key => $valus)
    {
        print "<pre>";
        print "<h4>content</h4>";
        print ($valus->comment_content);
        print "<h4>data</h4>";
        print ($valus->comment_date);
        print "</pre>";
    }

    ?>
</div>
