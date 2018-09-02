<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Ticket */

$this->title = $model->ticket_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tickets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->ticket_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->ticket_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ticket_id',
            'pazh_id',
            'business_id',
            'ticket_subject',
            'ticket_content:ntext',
            'ticket_department',
            'ticket_status',
            'ticket_submit_date',
            'ticket_last_update',
            'user_visibility',
        ],
    ]) ?>

    <?php
        $comment = $model->get_comment_by_ticket_id($model->ticket_id);

        foreach ($comment as $value) {
            print "<pre>";
            print "ID user";
            print $value->pazh->user_username;
            print "<pre>";
            print "comment";
            print $value->comment_content;
            print "</pre></pre>";

        }

    ?>
</div>
