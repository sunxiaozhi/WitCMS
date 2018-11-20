<?php
/**
 * 图片上传模型
 * User: sunxiaozhi
 * Date: 2018/11/20 14:33
 */

namespace common\models;

use Yii;
use yii\base\Model;

class ImgUploadFile extends Model
{
    public $imgFiles;

    public function rules()
    {
        return [
            ['imgFiles', 'safe']
        ];
    }

    /**
     * 图片上传
     * @return array|bool
     * @throws \yii\base\Exception
     */
    public function upload()
    {
        if ($this->validate()) {
            $path = Yii::getAlias('@uploadPath') . date("Ymd");

            if (!is_dir($path) || !is_writable($path)) {
                \yii\helpers\FileHelper::createDirectory($path, 0777, true);
            }

            foreach ($this->imgFiles as $file) {
                $filedetail = '/goods_' . md5(uniqid() . mt_rand(10000, 99999999)) . '.' . $file->extension;
                $filePath = $path . $filedetail;

                if ($file->saveAs($filePath)) {

                    //这里将上传成功后的图片信息保存到数据库
                    $imageUrl = $this->parseImageUrl($filePath);
                    $imageModel = new File();
                    $imageModel->md5_file = $imageUrl;
                    $imageModel->path = $imageUrl;

                    $imageModel->save(false);
                    $imageId = Yii::$app->db->getLastInsertID();
                }
            }
            //图片上传后返回值
            return ['imageUrl' => $imageUrl, 'imageId' => $imageId];
        }

        return false;
    }

    /**
     * 这里在upload中定义了上传目录根目录别名，以及图片域名
     * @author Zhiqiang Guo
     */
    private function parseImageUrl($filePath)
    {
        if (strpos($filePath, Yii::getAlias('@uploadPath')) !== false) {
            return str_replace(Yii::getAlias('@uploadPath'), '', $filePath);
        } else {
            return $filePath;
        }
    }
}