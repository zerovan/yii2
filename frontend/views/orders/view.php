<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Orders */

$this->title = $model->order_id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->order_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->order_id], [
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
        ],
    ]) ?>

    <?php

    $comments = $model->select_comment_by_order_id($model->order_id);

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
