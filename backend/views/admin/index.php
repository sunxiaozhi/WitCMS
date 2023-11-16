<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', Yii::t('backend','Admins'));
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">
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

                    /*[
                        'attribute' => 'id',
                        'options' => ['width' => '50px;']
                    ],*/
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
                        'filter' => Html::activeDropDownList($searchModel, 'status', [0 => '注销', 10 => '正常'], ['prompt' => '全部', 'class' => 'form-control']),
                    ],
                    [
                        'attribute' => 'login_ip',
                        'options' => ['width' => '120px;']
                    ],
                    [
                        'attribute' => 'login_num',
                        'options' => ['width' => '100px;']
                    ],
                    [
                        'attribute' => 'last_time',
                        'format' => ['date', 'php:Y-m-d H:i'],
                        'options' => ['width' => '200px;']
                    ],
                    /*[
                        'attribute' => 'created_at',
                        'format' => ['date', 'php:Y-m-d H:i'],
                        'options' => ['width' => '200px;']
                    ],*/
                    /*[
                        'attribute' => 'updated_at',
                        'format' => ['date', 'php:Y-m-d H:i'],
                        'options' => ['width' => '200px;']
                    ],*/
                    [
                        'header' => '操作',
                        'class' => 'backend\grid\ActionColumn',
                        'template' => '{update} {change-password} {accredit} {delete}'
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
