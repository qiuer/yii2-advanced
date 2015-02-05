<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ThirdConfig */

$this->title = 'Create Third Config';
$this->params['breadcrumbs'][] = ['label' => 'Third Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="third-config-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
