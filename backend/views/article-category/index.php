<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ArticleCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Article Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-category-index">

    <div class="box">
        <div class="box-header">
            <div class="box-title">
                <?= Html::a(Html::tag('i', ' ' . Yii::t('backend', 'Create'), ['class' => "fa fa-plus"]), ['create'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'attribute' => 'name',
                        'format' => 'raw',
                    ],
                    [
                        'header' => '操作',
                        'class' => 'backend\grid\ActionColumn',
                        'template' => '{create} {update} {delete}',
                        'buttons' => [
                            'create' => function ($url, $model, $key) {
                                return Html::a('<span class="fa fa-plus"></span> 添加子分类', ['create', 'parent_id' => $key], [
                                    'title' => '添加子分类',
                                    'class' => 'btn btn-success btn-xs'
                                ]);
                            },
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>

</div>
