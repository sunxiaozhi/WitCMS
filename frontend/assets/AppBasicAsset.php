<?php
/**
 * 默认主题样式
 * User: sunxiaozhi
 * Date: 2018/12/3 9:27
 */

namespace frontend\assets;

use yii\web\AssetBundle;

class AppBasicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/static/basic';
    public $css = [
        'plugins/bootstrap/css/bootstrap.min.css',
        'css/style.css',
        'css/headers/header_default.css',
        'plugins/bootstrap/css/bootstrap-responsive.min.css',
        'css/style_responsive.css',
        'plugins/font-awesome/css/font-awesome.css',
        ['css/themes/default.css', 'id' => 'style_color'],
        ['css/headers/header_default.css', 'id' => 'style_color-header'],
    ];
    public $js = [
        'js/jquery-1.8.2.min.js',
        'js/modernizr.custom.js',
        'plugins/bootstrap/js/bootstrap.min.js',
        'plugins/back-to-top.js',
        'js/app.js',
        'js/preload.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];

}