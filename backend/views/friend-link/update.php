<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FriendLink */

$this->title = Yii::t('backend', 'Update');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Friend Links'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="friend-link-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
