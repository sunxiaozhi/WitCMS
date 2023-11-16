<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Config */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box">
    <div class="box-body">
        <div class="config-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'value')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'sort')->textInput() ?>

            <?= $form->field($model, 'status')->radioList(['1'=>'正常','0'=>'隐藏'],['itemOptions' => ['class' => 'flat-blue']]) ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

