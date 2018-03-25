<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', Yii::t('backend', 'Backend Menus'));
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <p class="text-right">
        <?= Html::a(Yii::t('backend', 'Create Backend Menu'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!--<div class="box box-primary">
        <div class="box-body">
            <? /*= $this->render('_search', ['model' => $searchModel]); */ ?>
        </div>
    </div>-->

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'name',
                        'format' => 'raw',
                        'options' => ['width' => '150px;']
                    ],
                    [
                        'attribute' => 'route',
                        'options' => ['width' => '150px;']
                    ],
                    [
                        'attribute' => 'icon',
                        'options' => ['width' => '80px;'],
                        'content' => function($model) {
                            return $model['icon'] ? '<i class="' . $model['icon'] . '"></i>' : '';
                        }
                    ],
                    [
                        'attribute' => 'status',
                        'content' => function ($model) {
                            return $model['status'] ?
                                Html::tag('span', '显示', ['class' => 'label label-sm label-success']) :
                                Html::tag('span', '隐藏', ['class' => 'label label-sm label-danger']);
                        },
                        'filter' => Html::activeDropDownList($searchModel, 'status', [0 => '隐藏', 1 => '显示'], ['prompt' => '全部', 'class' => 'form-control']),
                        'options' => ['width' => '120px;']
                    ],
                    [
                        'attribute' => 'created_at',
                        'format' => ['date', 'php:Y-m-d H:i:s'],
                        'options' => ['width' => '200px;']
                    ],
                    [
                        'attribute' => 'updated_at',
                        'format' => ['date', 'php:Y-m-d H:i:s'],
                        'options' => ['width' => '200px;']
                    ],
                    [
                        'header' => '操作',
                        'class' => 'yii\grid\ActionColumn',
                        'template' => ' {update} {delete}'
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
