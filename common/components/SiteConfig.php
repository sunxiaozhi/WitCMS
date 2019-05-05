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
use yii\caching\FileDependency;
use common\helpers\DependencyFileHelper;

class SiteConfig extends Component
{
    /**
     * 获取网站配置
     * @throws \yii\base\InvalidConfigException
     */
    public static function getSiteConfigs()
    {
        $cache = Yii::$app->getCache();

        $configs = $cache->get('config');

        if ($configs === false) {
            $configs = Config::find()->asArray()->all();

            $dependencyFileHelper = Yii::createObject([
                    'class' => DependencyFileHelper::className(),
                    'dependencyFileName' => 'config.txt',
                ]
            );

            $dependencyFileName = $dependencyFileHelper->createDependencyFile();

            $dependency = new FileDependency(['fileName' => $dependencyFileName]);

            $cache->set('config', $configs, 0, $dependency);
        }

        foreach ($configs as $config) {
            Yii::$app->params['site'][$config['name']] = $config['value'];
        }
    }
}