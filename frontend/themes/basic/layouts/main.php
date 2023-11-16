<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
use common\models\Article;
use frontend\widgets\MenuView;
use frontend\assets\AppBasicAsset;

AppBasicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if IE 7]> <html lang="en" class="ie7"> <![endif]-->  
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="<?= Yii::$app->language ?>"> <!--<![endif]-->
<head>
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="<?= Html::encode(Yii::$app->params['site']['WEB_SITE_KEYWORDS'])?>" />
    <meta name="description" content="<?= Html::encode(Yii::$app->params['site']['WEB_SITE_DESCRIPTION'])?>" />
    <meta name="author" content="<?= Html::encode(Yii::$app->params['site']['WEB_SITE_AUTHOR'])?>" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?= Yii::$app->params['site']['WEB_STATISTICAL_CODE'] ?>
</head>

<body>
<?php $this->beginBody() ?>
<!--=== Style Switcher ===-->    
<!--<i class="style-switcher-btn icon-cogs"></i>
<div class="style-switcher">
    <div class="theme-close"><i class="icon-remove"></i></div>
    <div class="theme-heading"><?/*= Yii::t('frontend', 'Theme Colors')*/?></div>
    <ul class="unstyled">
        <li class="theme-default theme-active" data-style="default" data-header="light"></li>
        <li class="theme-blue" data-style="blue" data-header="light"></li>
        <li class="theme-orange" data-style="orange" data-header="light"></li>
        <li class="theme-red" data-style="red" data-header="light"></li>
        <li class="theme-light" data-style="light" data-header="light"></li>
    </ul>
</div>-->
<!--/style-switcher-->
<!--=== End Style Switcher ===-->    

<!--=== Top ===-->    
<div class="top">
    <div class="container">
        <ul class="loginbar pull-right">
            <li><i class="icon-globe"></i><a><?= Yii::t('frontend', 'Languages')?> <i class="icon-sort-up"></i></a>
            	<ul class="nav-list">
                	<!--<li class="active"><a href="#"><?/*= Yii::t('frontend', 'English')*/?></a><i class="icon-ok"></i></li>-->
                	<li class="active"><a href="#"><?= Yii::t('frontend', 'Chinese')?></a><i class="icon-ok"></i></li>
                </ul>
            </li>
        </ul>
    </div>
</div><!--/top-->
<!--=== End Top ===-->    

<!--=== Header ===-->
<div class="header">
    <div class="container">
        <!-- Logo -->
        <div class="logo">
            <a href="<?= Yii::$app->getHomeUrl()?>"><img id="logo-header" src="/static/basic/img/default.png" alt="Logo" /><h2 style="display: inline">技术之路</h2></a>
        </div><!-- /logo -->
                                    
        <!-- Menu -->       
        <div class="navbar">
            <div class="navbar-inner">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a><!-- /nav-collapse -->                                  
                <div class="nav-collapse collapse">
                    <?= MenuView::widget()?>
                    <!--<div class="search-open">
                        <div class="input-append">
                            <form />
                                <input type="text" class="span3" placeholder="Search" />
                                <button type="submit" class="btn-u">Go</button>
                            </form>
                        </div>
                    </div>-->
                </div><!-- /nav-collapse -->                                
            </div><!-- /navbar-inner -->
        </div><!-- /navbar -->                          
    </div><!-- /container -->               
</div><!--/header -->      
<!--=== End Header ===-->

<!--=== Breadcrumbs ===-->
<div class="breadcrumbs margin-bottom-10">
    <div class="container">
        <h1 class="color-green pull-left">
            <?= isset($this->params['breadcrumbTitle']) ? $this->params['breadcrumbTitle'] : '';?>
            <?= isset($this->params['breadcrumbItem']) ? $this->params['breadcrumbItem'] : ''?>
        </h1>
    </div>
</div>
<!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->
<div class="container">		
	<div class="row-fluid blog-page">    
        <!-- Left Sidebar -->
        <?= $content ?>
        <!--/span9-->

        <!-- Right Sidebar -->
    	<?= $this->render('/public/siderbar')?>
        <!--/span3-->
    </div><!--/row-fluid-->        
</div><!--/container-->		
<!--=== End Content Part ===-->

<!--=== Footer ===-->
<div class="footer">
	<div class="container">
		<div class="row-fluid">
			<div class="span4">
                <!-- About -->
		        <div class="headline"><h3><?= Yii::t('frontend', 'About')?></h3></div>
				<!--<p class="margin-bottom-25">Unify is an incredibly beautiful responsive Bootstrap Template for corporate and creative professionals.</p>
				<p class="margin-bottom-25">Unify is an incredibly beautiful responsive Bootstrap Template for corporate and creative professionals.</p>
				<p class="margin-bottom-25">Unify is an incredibly beautiful responsive Bootstrap Template for corporate and creative professionals.</p>-->
                <?= Yii::$app->params['site']['WEB_SITE_ABOUT']?>

	            <!-- Monthly Newsletter -->
		        <!--<div class="headline"><h3>Monthly Newsletter</h3></div>
				<p>Subscribe to our newsletter and stay up to date with the latest news and deals!</p>
				<form class="form-inline" />
					<div class="input-append">
						<input type="text" placeholder="Email Address" class="input-medium" />
						<button class="btn-u">Subscribe</button>
					</div>
				</form>		-->
			</div><!--/span4-->	
			
			<div class="span4">
                <div class="posts">
                    <div class="headline"><h3><?= Yii::t('frontend', 'Random Articles')?></h3></div>
                    <?php
                        $articles = Article::find()->select(['id', 'title'])->where(['status' => Article::STATUS_YES])->orderBy('rand()')->limit(3)->all();
                        foreach ($articles as $article) {
                            $url = Url::to(['article/view', 'id' => $article->id]);
                            echo '<dl class="dl-horizontal">
                                    <dt><a href="' . $url .'"><img src="/static/basic/img/sliders/elastislide/11.jpg" alt="" /></a></dt>
                                    <dd>
                                        <p><a href="' . $url .'">' . $article->title . '</a></p>
                                    </dd>
                                </dl>';
                        }
                    ?>
                </div>
			</div><!--/span4-->

			<div class="span4">
	            <!-- Monthly Newsletter -->
		        <div class="headline"><h3><?= Yii::t('frontend', 'Site Statistics')?></h3></div>
                <address>
                    <?php $siteAllInfo = Yii::$app->siteInfo->getSiteAllInfo();?>
                    文章总数：<?= $siteAllInfo['articleCount']?> 篇<br/>
                    分类总数：<?= $siteAllInfo['articleCategoryCount']?> 个<br/>
                    标签总数：<?= $siteAllInfo['articleTagCount']?> 个<br/>
                    <!--评论总数：<?/*= Yii::$app->siteInfo->getCommentCount()*/?> 条<br/>-->
                    网站已运行：<?= $siteAllInfo['runningDays']?>
                </address>

                <!-- Stay Connected -->
		        <div class="headline"><h3><?= Yii::t('frontend', 'Stay Connected')?></h3></div>
                <ul class="social-icons">
                    <li><a target="_blank" href="https://github.com/sunxiaozhi" data-original-title="Github" class="social_github"></a></li>
                </ul>
			</div><!--/span4-->
		</div><!--/row-fluid-->	
	</div><!--/container-->	
</div><!--/footer-->	
<!--=== End Footer ===-->

<!--=== Copyright ===-->
<div class="copyright">
	<div class="container">
		<div class="row-fluid">
			<div class="span12">
                <p>&copy; <?= date('Y')?> WitCMS <a href="http://www.beian.miit.gov.cn" target="_blank"><?= Yii::$app->params['site']['WEB_SITE_ICP']?></a></p>
			</div>
			<!--<div class="span4">
				<a href="index.html"><img id="logo-footer" src="basic_assets/img/logo2-default.png" class="pull-right" alt="" /></a>
			</div>-->
		</div><!--/row-fluid-->
	</div><!--/container-->	
</div><!--/copyright-->	
<!--=== End Copyright ===-->

<!-- JS Global Compulsory -->           
<!--<script type="text/javascript" src="/static/basic/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/static/basic/js/modernizr.custom.js"></script>
<script type="text/javascript" src="/static/basic/plugins/bootstrap/js/bootstrap.min.js"></script>-->
<!-- JS Implementing Plugins -->
<!--<script type="text/javascript" src="/static/basic/plugins/back-to-top.js"></script>-->
<!-- JS Page Level -->
<!--<script type="text/javascript" src="/static/basic/js/app.js"></script>
<script type="text/javascript" src="/static/basic/js/preload.js"></script>-->

<!--[if lt IE 9]>
    <script src="/static/basic/js/respond.js"></script>
<![endif]-->

<?php $this->endBody() ?>

<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
    });
</script>
</body>
</html>
<?php $this->endPage() ?>