<?php
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $breadcrumbTitle string */
/* @var $breadcrumbItem string */
use frontend\widgets\ArticleListView;
$this->title = Yii::t('common', 'Articles');
$this->params['breadcrumbTitle'] = $breadcrumbTitle;
$this->params['breadcrumbItem'] = $breadcrumbItem;
?>

<div class="span9">
    <?= ArticleListView::widget([
            'dataProvider' => $dataProvider,//数据提供器
        ]
    ) ?>
</div>