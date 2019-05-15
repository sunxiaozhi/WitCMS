<?php

/* @var $this yii\web\View */
/* @var $info array */

$this->title = '仪表盘';
$this->params['breadcrumbs'][] = $this->title;

$siteAllInfo = Yii::$app->siteInfo->getSiteAllInfo();
?>

<!-- Info boxes -->
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-edit"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"><?= Yii::t('backend', 'Article') ?></span>
                <span class="info-box-number"><?= $siteAllInfo['articleCount']?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <!--<div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-comments"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">评论</span>
                <span class="info-box-number">100</span>
            </div>
        </div>
    </div>-->
    <!-- /.col -->

    <!-- fix for small devices only -->
    <!--<div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">用户</span>
                <span class="info-box-number">200</span>
            </div>
        </div>
    </div>-->
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-link"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">友情链接</span>
                <span class="info-box-number"><?= $siteAllInfo['friendLinkCount']?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<div class="row">
    <div class="col-sm-6 col-xs-12">
        <div class="box">
            <div class="box-header" style="border-bottom: 2px solid #eee">
                <div class="box-title">运行环境</div>
            </div>
            <div class="box-body no-padding">
                <style>
                    .list-group {
                        margin: 0;
                    }

                    .list-group-item > .badge {
                        float: left
                    }

                    li.list-group-item strong {
                        margin-left: 15px;
                    }

                    li.list-group-item {
                        border: 0;
                    }
                </style>

                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="badge"><?= Yii::$app->name ?></span>
                        <strong><?= Yii::$app->getVersion() ?></strong>
                    </li>
                    <li class="list-group-item">
                        <span class="badge">Web Server</span>
                        <strong><?= $info['OPERATING_ENVIRONMENT'] ?></strong>
                    </li>
                    <li class="list-group-item">
                        <span class="badge badge-danger">PHP版本</span>
                        <strong><?= $info['PHP_VERSION'] ?></strong>
                    </li>
                    <li class="list-group-item">
                        <span class="badge badge-success">数据库信息</span>
                        <strong><?= $info['DB_INFO'] ?></strong>
                    </li>
                    <li class="list-group-item">
                        <span class="badge badge-success">文件上传限制</span>
                        <strong><?= $info['UPLOAD_MAX_FILESIZE'] ?></strong>
                    </li>
                    <li class="list-group-item">
                        <span class="badge badge-success">脚本超时限制</span>
                        <strong><?= $info['MAX_EXECUTION_TIME'] ?></strong>
                    </li>
                    <li class="list-group-item">
                        <span class="badge badge-danger">PHP执行方式</span>
                        <strong><?= $info['PHP_RUN_MODE'] ?></strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
