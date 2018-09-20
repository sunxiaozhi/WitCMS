<?php
/* @var $dataProvider yii\data\ActiveDataProvider */
use frontend\widgets\ArticleListView;
$this->title = Yii::t('common', 'Articles');
$this->params['breadcrumbTitle'] = '文章';
$this->params['breadcrumbItem'] = '标签：' . $breadcrumbItem;
?>

<div class="span9">
    <?= ArticleListView::widget([
            'dataProvider' => $dataProvider,//数据提供器
        ]
    ) ?>
</div>