<?php
/**
 * 网站配置
 * Author: sunhuanzhi
 * Date: 2018/10/8 16:36
 */

namespace common\components;

use Yii;
use yii\base\Component;
use common\models\Config;

class SiteConfig extends Component
{
    public static $configDatas;

    public static function getSiteConfigs()
    {
        self::$configDatas = Config::find()->asArray()->all();

        foreach (self::$configDatas as $configData) {
            Yii::$app->params['site'][$configData['name']] = $configData['value'];
        }
    }
}