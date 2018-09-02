<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Ticket */

$this->title = Yii::t('app', 'Update Ticket: {nameAttribute}', [
    'nameAttribute' => $model->ticket_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tickets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ticket_id, 'url' => ['view', 'id' => $model->ticket_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ticket-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
