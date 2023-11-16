<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '用户组授权';
$this->params['title_sub'] = '';
?>

<!-- BEGIN FORM-->
<div class="box ">
    <div class="box-body">
        <div class="admin-form">
            <?php $form = ActiveForm::begin(); ?>
            <div class="form-group">
                <label>用户组</label>
                <div class="mt-radio-list">
                    <?php foreach ($roles as $role) : ?>
                        <label class="mt-radio mt-radio-outline">
                            <input class="flat-blue" type="radio" name="param" value="<?= $role->name ?>" <?php echo in_array($role->name, $group) ? 'checked' : ''; ?> />
                            <span></span>
                            <?= $role->name ?> (<?= $role->description ?>)
                        </label>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="form-actions">
                <?= Html::submitButton('<i class="icon-ok"></i> 确定', ['class' => 'btn blue ajax-post', 'target-form' => 'form-aaa']) ?>
            </div>
            <?php $form = ActiveForm::end(); ?>

        </div>
    </div>
</div>


