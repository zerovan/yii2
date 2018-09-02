<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">
    <?php \yii\widgets\Pjax::begin() ?>

    <?php $form = ActiveForm::begin(['options'=>['data-pjax'=>'']]); ?>

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_barcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_status')->textInput() ?>

    <?= $form->field($model, 'product_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'product_taxonomy_id')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'product_published_date')->textInput() ?>

    <?= $form->field($model, 'product_modified_date')->textInput() ?>

    <?= $form->field($model, 'product_language')->textInput() ?>

    <?= $form->field($model, 'product_slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'business_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_en_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php \yii\widgets\Pjax::end(); ?>

</div>
