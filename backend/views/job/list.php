<?php
/**
 * Created by PhpStorm.
 * User: qxm
 * Date: 14/11/3
 * Time: 下午3:58
 */
?>
<div>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => yii\grid\CheckboxColumn::className()],
            'code',
            'title',
            'division',
            ['class' => yii\grid\ActionColumn::className()]
        ]
    ])?>
</div>