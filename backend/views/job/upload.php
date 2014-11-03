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
            <tr id="delete-<?= $key?>">
                <td><?= $form->field($model, "[$key]code")->textInput(['value' => $value['code'] ]) ?></td>
                <td><?= $form->field($model, "[$key]title")->textInput(['value' => $value['title']]) ?></td>
                <td><?= $form->field($model, "[$key]division")->textInput(['value' => $value['division']])?></td>
                <td><?= Html::button('删除', ['class' => 'job-delete btn btn-danger', 'data' => $key])?></td>
            </tr>
        <?php endforeach;?>
    </table>
    <?= Html::submitButton('确定提交', ['class' => 'btn btn-info'])?>
    <?php $form = \yii\widgets\ActiveForm::end()?>
</div>
<?php
$js = <<<JavaScript
$(".job-delete").click(function() {
   var id = $(this).attr('data');
   $("#delete-" + id).remove();
});
JavaScript;
$this->registerJs($js, yii\web\View::POS_END);
?>