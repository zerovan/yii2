<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pazh_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_date')->textInput() ?>

    <?= $form->field($model, 'order_modified_date')->textInput() ?>

    <?= $form->field($model, 'order_status')->textInput() ?>

    <?= $form->field($model, 'order_post_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'order_post_method')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_post_time')->textInput() ?>

    <?= $form->field($model, 'order_export_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_del')->textInput() ?>

    <?= $form->field($model, 'order_lock')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
