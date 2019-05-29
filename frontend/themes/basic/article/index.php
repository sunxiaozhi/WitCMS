<?php
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $breadcrumbTitle string */
/* @var $breadcrumbItem string */
//use frontend\widgets\ArticleListView;
use frontend\widgets\articles\ArticlesListView;

$this->title = Yii::$app->params['site']['WEB_SITE_TITLE'];
$this->params['breadcrumbTitle'] = $breadcrumbTitle;
$this->params['breadcrumbItem'] = $breadcrumbItem;
?>

<div class="span9">
    <?= ArticlesListView::widget([
            'dataProvider' => $dataProvider,//数据提供器
            'itemView' => '@frontend/widgets/articles/views/list',
        ]
    ) ?>
</div>