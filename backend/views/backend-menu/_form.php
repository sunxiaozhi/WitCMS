<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Menu */
/* @var $form yii\widgets\ActiveForm */
/* @var $treeArr backend\helpers\Tree  getTree()*/
?>
<div class="box box-primary">
    <div class="box-body">
        <div class="menu-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'parent_id')->dropDownList([0 => '一级菜单'] + $treeArr, ['encode' => false]) ?>

            <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status')->radioList(['0' => '隐藏', '1' => '显示']) ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>