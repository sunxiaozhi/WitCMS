<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AdminLteAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'admin_lte/components/bootstrap/css/bootstrap.min.css',
        'admin_lte/components/font-awesome/css/font-awesome.min.css',
        'admin_lte/components/Ionicons/css/ionicons.min.css',
        'admin_lte/components/jvectormap/jquery-jvectormap.css',
        'admin_lte/dist/css/AdminLTE.min.css',
        'admin_lte/dist/css/skins/_all-skins.min.css',
    ];
    public $js = [
        'admin_lte/components/jquery/jquery.min.js',
        'admin_lte/components/bootstrap/js/bootstrap.min.js',
        'admin_lte/plugins/iCheck/icheck.min.js',
        'admin_lte/components/fastclick/lib/fastclick.js',
        'admin_lte/dist/js/adminlte.min.js',
        'admin_lte/components/jquery-sparkline/dist/jquery.sparkline.min.js',
        'admin_lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'admin_lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'admin_lte/components/jquery-slimscroll/jquery.slimscroll.min.js',
        //'admin_lte/components/chart.js/Chart.js',
        //'admin_lte/dist/js/pages/dashboard2.js',
        'admin_lte/dist/js/demo.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
