<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Admin */

$this->title = Yii::t('backend', 'Change Password');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Admins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="admin-update">

    <div class="box ">
        <div class="box-body">
            <div class="admin-form">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'password')->textInput() ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>

</div>
