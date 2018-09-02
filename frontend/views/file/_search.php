<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\searchFile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="file-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'en_name') ?>

    <?= $form->field($model, 'fa_name') ?>

    <?= $form->field($model, 'date_time') ?>

    <?= $form->field($model, 'teacher') ?>

    <?php echo $form->field($model, 'tag') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
