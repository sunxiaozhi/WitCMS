<?php
/**
 * WitPHP
 * 引用adminlte的插件
 * Author: sunhuanzhi
 * Date: 2018/8/7 16:45
 */

namespace backend\assets;

use yii\web\AssetBundle;

class AdminLtePluginAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';
    public $js = [
        'iCheck/icheck.min.js',
        // more plugin Js here
    ];
    public $css = [
        'iCheck/all.css',
        // more plugin CSS here
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
    ];
}