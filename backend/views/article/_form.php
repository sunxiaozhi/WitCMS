<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use froala\froalaeditor\FroalaEditorWidget;
use kartik\file\FileInput;
use common\models\ImgUploadFile;
use common\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $form yii\widgets\ActiveForm */
/* @var $treeArr backend\helpers\Tree  getTree() */
$imgUploadFile = new ImgUploadFile();

$preview[] = Html::img(Url::toImage($model->thumb), ['class' => 'file-preview-image', 'width' => '100%', 'height' => '100%']);
?>

<div class="box">
    <div class="box-body">
        <div class="article-form">
            <?php $form = ActiveForm::begin(); ?>
            <div class="col-md-8">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'sub_title')->textInput() ?>
                <?= $form->field($model, 'abstract')->textarea() ?>
                <?= $form->field($model, 'thumb')->label(false)->hiddenInput() ?>
                <?= $form->field($imgUploadFile, 'imgFiles[]')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions' => [
                        'uploadUrl' => \yii\helpers\Url::to(['img-upload/asyncphoto']),
                        //'showCaption' => false,
                        //'showRemove' => false,
                        //'showPreview' => false,
                        //'showClose' => false,
                        //'showUpload' => false, //是否显示上传按钮
                        'browseLabel' => '选择照片',
                        'initialPreview' => $preview,
                        'initialPreviewConfig' =>[]
                    ],
                    'pluginEvents' => [
                        'fileuploaded' => "function (object,data){
                            $('form #article-thumb').val(data.response.imageUrl);
                        }"
                    ]
                ]); ?>

                <!--文章内容-->
                <?= $form->field($model, 'content')->widget(\kartik\markdown\MarkdownEditor::className()) ?>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <div class="box-title">分类</div>
                        <div class="box-body">
                            <?= $form->field($model, 'category_id')->dropDownList([0 => '无分类'] + $treeArr, ['encode' => false]) ?>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="box-header">
                        <div class="box-title">标签</div>
                        <div class="box-body">
                            <?= $form->field($model, 'tag')->textInput() ?>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="box-header">
                        <div class="box-title">SEO设置</div>
                        <div class="box-body">
                            <?= $form->field($model, 'seo_title')->textInput() ?>
                            <?= $form->field($model, 'seo_keywords')->textInput() ?>
                            <?= $form->field($model, 'seo_description')->textInput() ?>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="box-header">
                        <div class="box-title">设置</div>
                        <div class="box-body">
                            <?= $form->field($model, 'status')->radioList(['1' => '正常', '0' => '隐藏'], ['itemOptions' => ['class' => 'flat-blue']]) ?>
                            <?= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="box-header">
                        <div class="box-title">属性</div>
                        <div class="box-body">
                            <?= $form->field($model, 'is_recommend')->checkbox(['class' => 'flat-blue']) ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary']) ?>
                    <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
