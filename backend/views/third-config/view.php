<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\ThirdConfig;

/* @var $this yii\web\View */
/* @var $model common\models\ThirdConfig */

$this->title = ThirdConfig::$typeList[$model->type];
$this->params['breadcrumbs'][] = ['label' => 'Third Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="third-config-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'app_id',
            'app_secret',
            [
                'attribute' => 'type',
                'value' => ThirdConfig::$typeList[$model->type]
            ],
            [
                'attribute' => 'status',
                'value' => $model->status == 1 ? '正常' : '禁用'
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
