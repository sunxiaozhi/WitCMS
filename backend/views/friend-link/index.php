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

   <!-- <p class="text-right">
        <?/*= Html::a(Yii::t('backend', 'Create Friend Link'), ['create'], ['class' => 'btn btn-primary']) */?>
    </p>-->

    <!--<div class="box box-primary">
        <div class="box-body">
            <?php /*echo $this->render('_search', ['model' => $searchModel]); */?>
        </div>
    </div>-->

    <div class="box box-primary">
        <div class="box-body">
            <?php Pjax::begin(); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],
                    [
                        'class' => 'yii\grid\CheckboxColumn',
                        'options' => ['width' => '30px;']
                    ],
                    [
                        'attribute' => 'name',
                        'options' => ['width' => '120px;']
                    ],
                    //'image',
                    [
                        'attribute' => 'url',
                        'format' => ['url'],
                        'options' => ['width' => '140px;']
                    ],
                    [
                        'attribute' => 'target',
                        'options' => ['width' => '105px;'],
                        'content' => function($model){
                            return 'ddd';
                        },
                        'filter'  => Html::activeDropDownList($searchModel, 'target', ['_blank' => '新窗口', '_self' => '本窗口'], ['prompt'=>'全部','class'=>'form-control']),
                    ],
                    [
                        'attribute' => 'sort',
                        'options' => ['width' => '50px;']
                    ],
                    [
                        'attribute' => 'status',
                        'options' => ['width' => '100px;'],
                        'content' => function($model){
                            return 'ddd';
                        },
                        'filter'  => Html::activeDropDownList($searchModel, 'status', ['0' => '隐藏', '1' => '正常'], ['prompt'=>'全部','class'=>'form-control']),
                    ],
                    [
                        'attribute' => 'created_at',
                        'format' => ['date', 'php:Y-m-d H:i'],
                        'options' => ['width' => '140px;']
                    ],
                    [
                        'attribute' => 'updated_at',
                        'format' => ['date', 'php:Y-m-d H:i'],
                        'options' => ['width' => '140px;']
                    ],
                    [
                        'header' => '操作',
                        'class' => 'yii\grid\ActionColumn',
                        'template' => ' {update} {delete}'
                    ],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
