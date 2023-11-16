<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FriendLink */

$this->title = Yii::t('backend', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Friend Links'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="friend-link-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
