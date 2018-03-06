<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FriendLinkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Friend Links');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="friend-link-index">

    <p class="text-right">
        <?= Html::a(Yii::t('backend', 'Create Friend Link'), ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <div class="box box-primary">
        <div class="box-body">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],
                    ['class' => 'yii\grid\CheckboxColumn'],
                    'name',
                    'image',
                    'url:url',
                    'target',
                    [
                        'attribute' => 'sort',
                        'options' => ['width' => '50px;']
                    ],
                    [
                        'attribute' => 'status',
                        'options' => ['width' => '50px;']
                    ],
                    [
                        'attribute' => 'created_at',
                        'format' => ['date', 'php:Y-m-d H:i']
                    ],
                    [
                        'attribute' => 'updated_at',
                        'format' => ['date', 'php:Y-m-d H:i']
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => ' {update} {delete}'
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
