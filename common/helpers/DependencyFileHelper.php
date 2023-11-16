<?php
/**
 * 缓存的依赖文件
 * User: sunxiaozhi
 * Date: 2019/5/5 15:39
 */

namespace common\helpers;

use Yii;
use yii\base\BaseObject;
use yii\helpers\FileHelper;

class DependencyFileHelper extends BaseObject
{
    public $rootDir = '@common/runtime/cache/dependency/';

    public $dependencyFileName = 'cache.txt';

    /**
     * 创建缓存依赖文件
     * @return string
     * @throws \yii\base\Exception
     */
    public function createDependencyFile()
    {
        $dependencyFileName = $this->getDependencyFileName();

        if (!file_exists(dirname($dependencyFileName))) {
            FileHelper::createDirectory(dirname($dependencyFileName));
        }

        file_put_contents($dependencyFileName, time());

        return $dependencyFileName;
    }

    /**
     * 更新缓存依赖文件
     */
    public function updateDependencyFile()
    {
        $dependencyFileName = $this->getDependencyFileName();
        if (file_exists($dependencyFileName)) {
            file_put_contents($dependencyFileName, time());
        }
    }

    /**
     * 获取缓存依赖文件名
     * @return bool|string
     */
    protected function getDependencyFileName()
    {
        return Yii::getAlias($this->rootDir . $this->dependencyFileName);
    }

}