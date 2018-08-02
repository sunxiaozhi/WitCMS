<?php
/**
 * Created by PhpStorm.
 * User: sunxiaozhi
 * Date: 2018/3/22
 * Time: 21:07
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
/* @var $model /backend/modles/rabc */
?>

<div class="box ">
    <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>