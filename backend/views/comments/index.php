<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CommentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Comments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">
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
                    //['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'id',
                        'options' => ['width' => '80px;'],
                    ],
                    [
                        //'header' => Yii::t('backend', 'Article Name'),
                        'attribute' => 'article_id',
                        'options' => ['width' => '80px;']
                    ],
                    [
                        'attribute' => 'user_id',
                        'options' => ['width' => '80px;'],
                    ],
                    [
                        'attribute' => 'status',
                        'content' => function ($model) {
                            $status_value = Html::tag('span', '未审核', ['class' => 'label label-sm label-primary']);
                            if ($model->status == 1) {
                                $status_value = Html::tag('span', '通过', ['class' => 'label label-sm label-success']);
                            } elseif ($model->status == 2) {
                                $status_value = Html::tag('span', '未通过', ['class' => 'label label-sm label-danger']);
                            }
                            return $status_value;
                        },
                        'filter' => Html::activeDropDownList($searchModel, 'status', [0 => '未审核', 1 => '通过', 2 => '未通过'], ['prompt' => '全部', 'class' => 'form-control']),
                        'options' => ['width' => '110px;'],
                    ],
                    'content:ntext',
                    [
                        'attribute' => 'created_at',
                        'format' => ['date', 'php:Y-m-d H:i'],
                        'options' => ['width' => '200px;']
                    ],

                    [
                        'header' => '操作',
                        'class' => 'yii\grid\ActionColumn',
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
