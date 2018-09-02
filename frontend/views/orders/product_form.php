<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Orders


product_id
product_name
product_code
product_barcode
product_status
product_description
product_taxonomy_id
product_published_date
product_modified_date
product_language
product_slug
business_id
product_en_name

@var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_code')->textInput() ?>

    <?= $form->field($model, 'product_barcode')->textInput() ?>

    <?= $form->field($model, 'product_status')->textInput() ?>

    <?= $form->field($model, 'product_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_taxonomy_id')->textInput() ?>



    <?= $form->field($model, 'product_modified_date')->textInput() ?>

    <?= $form->field($model, 'product_language')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_slug')->textInput() ?>

    <?= $form->field($model, 'business_id')->textInput() ?>

    <?= $form->field($model, 'product_en_name')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
