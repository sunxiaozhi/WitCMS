<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ArticleTagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Article Tags');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-tag-index">

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
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
