<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Orders */

$this->title = 'Create product';
$this->params['breadcrumbs'][] = ['label' => 'product', 'url' => ['product']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('product_form', [
        'model' => $model,
    ]) ?>

</div>
