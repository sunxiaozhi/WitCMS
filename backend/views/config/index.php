<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ConfigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Configs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="config-index">
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
                    'name',
                    'title',
                    [
                        'attribute' => 'value',
                        'content' => function($model) {
                            return $model->value ? Html::encode(StringHelper::truncate($model->value, 20)) : '';
                        }
                    ],
                    ['header' => '操作',
                        'class' => 'backend\grid\ActionColumn',
                        'template' => '{create} {update} {delete}',
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
