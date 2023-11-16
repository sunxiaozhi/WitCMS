<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleTag */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box">
    <div class="box-body">
        <div class="article-category-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
