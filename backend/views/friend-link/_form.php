<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FriendLink */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
        <div class="friend-link-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'target')->radioList(['_blank'=>'新窗口打开','_self'=>'本窗口打开'])->label('状态') ?>

            <?= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status')->radioList(['1'=>'正常','0'=>'隐藏'])->label('状态') ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

