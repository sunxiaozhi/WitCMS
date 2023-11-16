<?php
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $breadcrumbTitle string */

/* @var $breadcrumbItem string */

use frontend\widgets\articles\ArticlesListView;

//标题
$this->title = Yii::$app->params['site']['WEB_SITE_TITLE'];

$this->params = [
    'breadcrumbTitle' => $breadcrumbTitle,
    'breadcrumbItem' => $breadcrumbItem,
];
?>

<div class="span9">
    <?= ArticlesListView::widget([
            'dataProvider' => $dataProvider,//数据提供器
            'itemView' => '@frontend/widgets/articles/views/list',
        ]
    ) ?>
</div>