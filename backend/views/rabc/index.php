<?php

use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Html;

$this->title = Yii::t('backend', 'Rabc');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rabc-index">
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
                    /*[
                        'class' => CheckboxColumn::className(),
                        'checkboxOptions' => function ($model, $key, $index, $column) {
                            return ['value' => $model->name];
                        }
                    ],*/
                    [
                        'attribute' => 'name',
                    ],
                    [
                        'attribute' => 'description',
                    ],
                    /*[
                        'class' => SortColumn::className(),
                        'primaryKey' => function($model){
                            return $model['name'];
                        },
                        'action' => Url::to(['roles-sort']),
                    ],*/
                    /*[
                        'class' => ActionColumn::className(),
                    ]*/
                    [
                        'class' => 'backend\grid\ActionColumn',
                        'header' => Yii::t('backend', 'Operate'),
                        'template' => '{update} {auth} {delete}',
                    ],
                ]
            ]) ?>
        </div>
    </div>
</div>
