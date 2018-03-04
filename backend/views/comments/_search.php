<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CommentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'form-inline'],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'article_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'parent_id') ?>

    <?= $form->field($model, 'content') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
