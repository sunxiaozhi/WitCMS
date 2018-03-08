<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="text-right">
        <?= Html::a(Yii::t('backend', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box box-primary">
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
                        'filter' => Html::activeDropDownList($searchModel, 'status', [0 => '注销', 10 => '正常'], ['prompt' => '全部', 'class' => 'form-control']),
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
                        'class' => 'yii\grid\ActionColumn'
                    ],
                ],
            ]); ?>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>
