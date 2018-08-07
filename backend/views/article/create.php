<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $treeArr backend\helpers\Tree  getTree()*/

$this->title = Yii::t('backend', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-create">

    <?= $this->render('_form', [
        'model' => $model,
        'treeArr' => $treeArr,
    ]) ?>

</div>
