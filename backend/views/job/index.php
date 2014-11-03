<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = "职位信息上传";
?>
<div>
    <br><br><br>
</div>
<div>
    <?php \yii\bootstrap\Modal::begin([
        'id' => 'upload',
        'clientOptions' => [
            'show' => true
        ]
    ])?>
    <?= Html::beginForm(['job/upload'], '', ['enctype' => 'multipart/form-data'])?>
    <?= Html::fileInput('job-file')?>
    <?= Html::submitButton('提交', ['class' => 'btn btn-warning'])?>
    <?= Html::endForm()?>
    <?php \yii\bootstrap\Modal::end()?>
</div>

