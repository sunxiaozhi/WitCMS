<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FriendLinkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Friend Links');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="friend-link-index">
    <div class="box">
        <div class="box-header">
            <div class="box-title">
                <?= Html::a(Html::tag('i', ' ' . Yii::t('backend', 'Create'), ['class' => "fa fa-plus"]), ['create'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <div class="box-body">
            <?php Pjax::begin(); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'attribute' => 'name',
                        'options' => ['width' => '150px;']
                    ],
                    [
                        'attribute' => 'url',
                        'format' => ['url'],
                        'options' => ['width' => '150px;']
                    ],
                    [
                        'attribute' => 'target',
                        'options' => ['width' => '105px;'],
                        'content' => function ($model) {
                            return $model['target'] == '_blank' ?
                                Html::tag('span', '新窗口', ['class' => 'label label-sm label-success']) :
                                Html::tag('span', '本窗口', ['class' => 'label label-sm label-danger']);
                        },
                        'filter' => Html::activeDropDownList($searchModel, 'target', ['_blank' => '新窗口', '_self' => '本窗口'], ['prompt' => '全部', 'class' => 'form-control']),
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
                        'options' => ['width' => '150px;']
                    ],
                    [
                        'attribute' => 'updated_at',
                        'format' => ['date', 'php:Y-m-d H:i'],
                        'options' => ['width' => '150px;']
                    ],
                    [
                        'header' => '操作',
                        'class' => 'backend\grid\ActionColumn',
                        'template' => ' {update} {delete}'
                    ],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
