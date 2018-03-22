<?php

use yii\grid\GridView;

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
                /* [
                     'class' => ActionColumn::className(),
                     'width' => '190px',
                     'buttons' => [
                         'view-layer' => function($url, $model, $key){
                             return Html::a('<i class="fa fa-folder"></i> ' . Yii::t('yii', 'View'), 'javascript:void(0)', [
                                 'title' => Yii::t('yii', 'View'),
                                 'onclick' => "viewLayer('" . Url::to(['role-view-layer', 'name' => $model->name]) . "',$(this))",
                                 'data-pjax' => '0',
                                 'class' => 'btn btn-white btn-sm',
                             ]);
                         },
                         'update' => function ($url, $model, $key) {
                             return Html::a('<i class="fa  fa-edit" aria-hidden="true"></i> ' . Yii::t('app', 'Update'), Url::to([
                                 'role-update',
                                 'name' => $model['name']
                             ]), [
                                 'title' => Yii::t('app', 'Update'),
                                 'data-pjax' => '0',
                                 'class' => 'btn btn-white btn-sm J_menuItem',
                             ]);
                         },
                         'delete' => function ($url, $model) {
                             return Html::a('<i class="fa fa-trash-o"></i> ' . yii::t('app', 'Delete'), Url::to(['role-delete', 'name'=>$model['name']]), [
                                 'title' => yii::t('app', 'Delete'),
                                 'data-pjax' => '0',
                                 'data-confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                 'class' => 'btn btn-white btn-sm',
                             ]);
                         },
                     ],
                     'template' => '{view-layer} {update} {delete}',
                 ]*/
            ]
        ]) ?>
    </div>
</div>

