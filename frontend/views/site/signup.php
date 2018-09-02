<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup', 'enableAjaxValidation' => true] ); ?>

                <?= $form->field($model, 'user_username' )->textInput(['autofocus' => true]) ->label('User Name')?>

                <?= $form->field($model, 'user_phone')->label('Phone Number') ?>

                <?= $form->field($model, 'user_mail')->label('Email') ?>

                <?= $form->field($model, 'admin_password')->passwordInput()->label('Password'); ?>

                <?= $form->field($model, 'user_default_business')->label('user business ID') ?>

                <?= $form->field($model, 'verify_code')->widget(\yii\captcha\Captcha::className()); ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button' ]) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
