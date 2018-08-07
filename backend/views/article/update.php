<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $treeArr backend\helpers\Tree  getTree()*/

$this->title = Yii::t('backend', 'Update');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="article-update">

    <?= $this->render('_form', [
        'model' => $model,
        'treeArr' => $treeArr,
    ]) ?>

</div>
