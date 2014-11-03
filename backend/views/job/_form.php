<?php
/**
 * Created by PhpStorm.
 * User: qxm
 * Date: 14/11/3
 * Time: 下午6:12
 */
use yii\helpers\Html;
?>
<div>
    <?php $form = \yii\bootstrap\ActiveForm::begin() ?>
    <?= $form->field($model, 'code')?>
    <?= $form->field($model, 'title')?>
    <?= $form->field($model, 'division')?>
    <?= Html::submitButton('确定', ['class' => 'btn btn-info'])?>
    <?php $form = \yii\bootstrap\ActiveForm::end()?>
</div>