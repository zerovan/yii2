<?php
use \yii\widgets\Pjax;
use \yii\widgets\ActiveForm;
use \yii\helpers\Html;
?>

<span class="btn btn-info">
    user name: <?php $query = $model->findOne($id);
    if($query===null)
        die('خطا در سیستم');
            echo $query->user_username;   ?>
</span>
<span class="btn btn-info">
    full name: <?php     echo $query->user_fullname;   ?>
</span>



<?php \yii\widgets\Pjax::begin();

     $form = ActiveForm::begin([
//            'action'=>['test'],

            'options' => ['data-pjax' => '']
    ]);

//
//          $form = ActiveForm::begin([
//                  'options'=>['data/Pjax' => true]]);
          ?>

    <div style="width: 550px; float:right" class="text-justify">

    <?= $form->field($model,'role')->checkboxList($model->Role());?>
    <?php //Html::checkboxList('role', $model->role , $model->Role(), [
    //    'item' => function ($index, $label, $name, $checked, $value) {
    //        return \yii\helpers\Html::checkbox($name, $checked, [
    //            'value' => $value,
    //            'disabled' => false,
    //            'label' => $label
    //        ]);
    //    },
    //]);
    //?>
    </div>
    <div style="width: 500px" class="text-justify ">
        <?= Html::label("permission")?>
    <?= //$form->field($model,'permission')->checkboxList( $model->Permission())
    Html::checkboxList('permission', $model->permission , $model->permission(), [
        'item' => function ($index, $label, $name, $checked, $value) {
            return \yii\helpers\Html::checkbox($name, $checked, [
                'value' => $value,
                'disabled' => true,
                'label' => $label
            ]);
        },
    ]);
    ?>
    </div>
    <?= //$form->field($model,'pazh_id',['options' => ['value'=>2 ]])->hiddenInput()
          Html::hiddenInput('pazh_id',$id);
     ?>

    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    <?php ActiveForm::end();
    \yii\widgets\Pjax::end();?>





