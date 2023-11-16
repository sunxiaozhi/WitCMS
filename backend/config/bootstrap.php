<?php
Yii::$container->set('yii\data\Pagination', [
    'defaultPageSize' => 15
]);
Yii::$container->set('yii\grid\ActionColumn', [
    'buttonOptions' => [
        'class' => 'btn btn-default btn-xs'
    ]
]);
Yii::$container->set('yii\grid\GridView', [
    'tableOptions' => ['class' => 'table table-bordered table-hover table-responsive'],
    'layout' => "{items}\n{summary}\n{pager}",
    //'summaryOptions' => ['class' => 'pagination-summary'],
]);
Yii::$container->set('yii\grid\DataColumn', [
    'sortLinkOptions' => ['class' => 'sorting'],
]);