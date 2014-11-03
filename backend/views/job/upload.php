<?php
/**
 * Created by PhpStorm.
 * User: qxm
 * Date: 14/11/3
 * Time: 下午2:09
 */
use yii\helpers\Html;
?>
<div>
    <?php $form = \yii\widgets\ActiveForm::begin([
        'action' => ['/job/confirm'],
        'fieldConfig' => [
            'template' => '{input}'
        ]
    ])?>

    <table>
        <tr>
            <td>部门编码</td>
            <td>部门名称</td>
            <td>用人司局</td>
        </tr>
        <?php foreach ($jobs as $key => $value) :?>
            <tr>
                <td><?= $form->field($model, "[$key]code")->textInput(['value' => $value['code'] ]) ?></td>
                <td><?= $form->field($model, "[$key]title")->textInput(['value' => $value['title']]) ?></td>
                <td><?= $form->field($model, "[$key]division")->textInput(['value' => $value['division']])?></td>
            </tr>
        <?php endforeach;?>
    </table>
    <?= Html::submitButton('确定提交', ['class' => 'btn btn-info'])?>
    <?php $form = \yii\widgets\ActiveForm::end()?>
</div>