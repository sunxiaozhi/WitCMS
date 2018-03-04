<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CommentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Comments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">

    <!--<p>
        <?/*= Html::a(Yii::t('backend', 'Create Comments'), ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->
    <div class="box box-primary">
        <div class="box-body">
            <?=$this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'article_id',
                    'user_id',
                    'parent_id',
                    'content:ntext',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
