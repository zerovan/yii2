<?php
use yii\widgets\Pjax;
use  yii\helpers\Html;
?>
<?php Pjax::begin(['enablePushState' => false]); ?>
<?= Html::beginForm(['test'],'post',['data-pjax'=>'']) ?>
<?= Html::input('text', 'test', '') ?>
<?php if(isset($res)) echo $res; ?>
<?= Html::submitButton('submit') ?>
    <?= Html::endForm() ?>

<?php Pjax::end(); ?>

