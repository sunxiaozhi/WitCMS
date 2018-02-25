<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AdminLteLoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'admin_lte/components/bootstrap/css/bootstrap.min.css',
        'admin_lte/components/font-awesome/css/font-awesome.min.css',
        'admin_lte/components/Ionicons/css/ionicons.min.css',
        'admin_lte/dist/css/AdminLTE.min.css',
        'admin_lte/plugins/iCheck/square/blue.css',
    ];
    public $js = [
        'admin_lte/components/jquery/jquery.min.js',
        'admin_lte/components/bootstrap/js/bootstrap.min.js',
        'admin_lte/plugins/iCheck/icheck.min.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
