<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FriendLinkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Friend Links');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="friend-link-index">

    <p>
        <?= Html::a(Yii::t('backend', 'Create Friend Link'), ['create'], ['class' => 'btn btn-success']) ?>
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

                    'name',
                    'image',
                    'url:url',
                    'target',
                    'sort',
                    'status',
                    'created_at:datetime',
                    'updated_at:datetime',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
