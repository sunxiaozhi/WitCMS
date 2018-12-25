<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleCategory */
/* @var $form yii\widgets\ActiveForm */
/* @var $treeArr backend\helpers\Tree  getTree()*/
?>
<div class="box">
    <div class="box-body">
        <div class="article-category-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'parent_id')->dropDownList([0 => '一级分类'] + $treeArr, ['encode' => false]) ?>

            <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>