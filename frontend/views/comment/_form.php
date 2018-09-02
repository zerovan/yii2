<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model frontend\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ticket_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pazh_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'comment_date')->textInput() ?>

    <?= $form->field($model, 'comment_user_visible')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
