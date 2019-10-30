<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box ">
    <div class="box-body">
        <div class="admin-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'username')->textInput() ?>

            <?= $form->field($model, 'email')->textInput() ?>

            <?= $form->field($model, 'status')->radioList([10 => '正常', 0 => '隐藏'], ['itemOptions' => ['class' => 'flat-blue']]) ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>