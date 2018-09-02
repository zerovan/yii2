<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Ticket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-form">
    <?php \yii\widgets\Pjax::begin(['enablePushState' => false]);?>

    <?php $form = ActiveForm::begin([
            'action'=>['test'],
            'enableClientValidation' => false,
            'options' => ['data-pjax' => '']
    ]); ?>

    <?= $form->field($model, 'pazh_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'business_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ticket_subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ticket_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ticket_department')->textInput() ?>

    <?= $form->field($model, 'ticket_status')->textInput() ?>

    <?= "ticket submit text". Html::input( 'text', 'ticket_submit_date'  ) ?>

<!--    --><?php //= $form->field($model, 'ticket_submit_date')->textInput() ?>

    <?= $form->field($model, 'ticket_last_update')->textInput() ?>

    <?= $form->field($model, 'user_visibility')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success','name'=>'submit']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php \yii\widgets\Pjax::end();?>

</div>
