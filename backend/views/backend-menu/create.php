<?php

/* @var $this yii\web\View */
/* @var $model common\models\Menu */
/* @var $treeArr backend\helpers\Tree */

$this->title = Yii::t('backend', Yii::t('backend', 'Create'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Backend Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-create">

    <?= $this->render('_form', [
        'model' => $model,
        'treeArr' => $treeArr,
    ]) ?>

</div>
