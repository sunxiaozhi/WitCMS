<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Articles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">
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
                        'attribute' => 'title',
                        'options' => ['width' => '250px;']
                    ],
                    /*[
                        'attribute' => 'thumb',
                        'options' => ['width' => '100px;'],
                        'content' => function ($model) {
                            return Html::img(Url::toImage($model->thumb), ['width'=> '90px', 'height'=>'20px']);
                        },
                    ],*/
                    [
                        'attribute' => 'category_id',
                        'label' => '分类',
                        'value' => function ($model) {
                            return $model->articleCategory ? $model->articleCategory->name : Yii::t('app', 'uncategoried');
                        },
                        'options' => ['width' => '100px;']
                    ],
                    [
                        'attribute' => 'sort',
                        'options' => ['width' => '50px;']
                    ],
                    [
                        'attribute' => 'status',
                        'options' => ['width' => '100px;'],
                        'content' => function ($model) {
                            return $model['status'] ?
                                Html::tag('span', '显示', ['class' => 'label label-sm label-success']) :
                                Html::tag('span', '隐藏', ['class' => 'label label-sm label-danger']);
                        },
                        'filter' => Html::activeDropDownList($searchModel, 'status', ['0' => '隐藏', '1' => '显示'], ['prompt' => '全部', 'class' => 'form-control']),
                    ],
                    [
                        'attribute' => 'created_at',
                        'format' => ['date', 'php:Y-m-d H:i'],
                        'options' => ['width' => '160px;']
                    ],
                    /*[
                        'attribute' => 'updated_at',
                        'format' => ['date', 'php:Y-m-d H:i'],
                        'options' => ['width' => '160px;']
                    ],*/
                    [
                        'class' => 'backend\grid\ActionColumn',
                        'template' => '{update} {delete}'
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
