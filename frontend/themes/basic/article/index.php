<?php
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $breadcrumbTitle string */
/* @var $breadcrumbItem string */
use frontend\widgets\ArticleListView;

$this->title = Yii::$app->params['site']['WEB_SITE_TITLE'];
$this->params['breadcrumbTitle'] = $breadcrumbTitle;
$this->params['breadcrumbItem'] = $breadcrumbItem;
?>

<div class="span9">
    <?= ArticleListView::widget([
            'dataProvider' => $dataProvider,//数据提供器
        ]
    ) ?>
</div>