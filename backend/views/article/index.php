<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Articles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <p class="text-right">
        <?= Html::a(Yii::t('backend', 'Create Article'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

   <!-- <div class="box box-primary">
        <div class="box-body">
            <?php /*echo $this->render('_search', ['model' => $searchModel]); */?>
        </div>
    </div>-->

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                //'layout' => "{items}\n{summary}\n{pager}",
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'title',
                    'sub_title',
                    'abstract',
                    'sort',
                    'status',
                    [
                        'attribute' => 'created_at',
                        'format' => ['date', 'php:Y-m-d H:i'],
                        'options' => ['width' => '160px;']
                    ],
                    [
                        'attribute' => 'updated_at',
                        'format' => ['date', 'php:Y-m-d H:i'],
                        'options' => ['width' => '160px;']
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
