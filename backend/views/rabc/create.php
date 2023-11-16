<?php
/**
 * Created by PhpStorm.
 * User: sunxiaozhi
 * Date: 2018/3/22
 * Time: 21:06
 */

$this->title = Yii::t('backend', 'Update');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Rabc'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="menu-update">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
</div>
