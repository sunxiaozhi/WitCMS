<?php
/**
 * 图片上传模型
 * User: sunxiaozhi
 * Date: 2018/11/20 14:33
 */

namespace common\models;

use Yii;
use yii\base\Model;
use yii\helpers\FileHelper;

class ImgUploadFile extends Model
{
    public $imgFiles;

    public function rules()
    {
        return [
            ['imgFiles', 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'imgFiles' => '文章图片',
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
            //图片保存路径
            $imgUploadPath = Yii::getAlias('@uploadImage') . '/' . date("Ymd") . '/';

            //创建目录
            if (!is_dir($imgUploadPath) || !is_writable($imgUploadPath)) {
                FileHelper::createDirectory($imgUploadPath, 0777, true);
            }

            //图片上传
            foreach ($this->imgFiles as $file) {
                $imgDetail = md5(uniqid() . mt_rand(10000, 99999999)) . '.' . $file->extension;

                $imgPath = $imgUploadPath . $imgDetail;

                if ($file->saveAs($imgPath)) {

                    //这里将上传成功后的图片信息保存到数据库
                    $imageUrl = $this->parseImageUrl($imgPath);
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
    private function parseImageUrl($imgPath)
    {
        if (strpos($imgPath, Yii::getAlias('@uploadImage')) !== false) {
            return str_replace(Yii::getAlias('@uploadImage'), '', $imgPath);
        } else {
            return $imgPath;
        }
    }
}