<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\ThirdConfig;

/* @var $this yii\web\View */
/* @var $model common\models\ThirdConfig */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="third-config-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model) ?>

    <?= $form->field($model, 'app_id')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'app_secret')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'type')->dropDownList(ThirdConfig::$typeList) ?>

    <?= $form->field($model, 'status')->radioList([1 => '启用', 0 => '禁用']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
