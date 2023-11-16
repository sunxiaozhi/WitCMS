<?php
/**
 * Url类
 * User: sunxiaozhi
 * Date: 2018/11/22 10:12
 */

namespace common\helpers;

use Yii;

class Url extends \yii\helpers\Url
{
    /**
     * 获取图片路径
     * @param $name
     * @return string
     */
    public static function toImage($name)
    {
        $baseUrl = Yii::$app->params['imageBaseUrl'];

        return $baseUrl . $name;
    }
}