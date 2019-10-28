<?php
/**
 * 图片上传
 * User: sunxiaozhi
 * Date: 2018/11/20 15:10
 */

namespace backend\controllers;

use Yii;
use \yii\web\Response;
use common\models\ImgUploadFile;
use yii\web\UploadedFile;
use yii\helpers\Url;

class ImgUploadController extends BackendBaseController
{
    /**
     * 图片上传
     * @return array
     * @throws \yii\base\Exception
     */
    public function actionAsyncPhoto()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $imgUploadFile = new ImgUploadFile();

        if (Yii::$app->request->isPost) {

            $imgUploadFile->imgFiles = UploadedFile::getInstances($imgUploadFile, 'imgFiles');

            if ($imageArr = $imgUploadFile->upload()) {
                return [
                    'imageUrl' => $imageArr['imageUrl'],
                ];
            }
        }

        return [
            'imageUrl' => '',
            'error' => '文件上传失败'
        ];
    }
}