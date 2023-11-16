<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', Yii::t('backend', 'Users'));
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
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
                        'options' => ['width' => '50px;']
                    ],
                    [
                        'attribute' => 'username',
                        'options' => ['width' => '120px;']
                    ],
                    //'auth_key',
                    //'password_hash',
                    //'password_reset_token',
                    [
                        'attribute' => 'email',
                        'format' => 'email',
                        'options' => ['width' => '180px;']
                    ],
                    [
                        'attribute' => 'status',
                        'options' => ['width' => '100px;'],
                        'content' => function ($model) {
                            return $model['status'] == 10 ?
                                Html::tag('span', '正常', ['class' => 'label label-sm label-success']) :
                                Html::tag('span', '注销', ['class' => 'label label-sm label-danger']);
                        },
                        'filter' => Html::activeDropDownList($searchModel, 'status', [10 => '正常', 0 => '注销',], ['prompt' => '全部', 'class' => 'form-control']),
                    ],
                    [
                        'attribute' => 'created_at',
                        'format' => ['date', 'php:Y-m-d H:i'],
                        'options' => ['width' => '200px;']
                    ],
                    [
                        'attribute' => 'updated_at',
                        'format' => ['date', 'php:Y-m-d H:i'],
                        'options' => ['width' => '200px;']
                    ],

                    [
                        'header' => '操作',
                        'class' => 'backend\grid\ActionColumn',
                        'template' => '{update} {delete}'
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
