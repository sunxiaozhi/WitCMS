<?php

use yii\grid\GridView;
use yii\grid\ActionColumn;

$this->title = Yii::t('backend', '权限');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="box box-primary">
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
                 [
                     'class' => ActionColumn::className(),
                 ]
            ]
        ]) ?>
    </div>
</div>

