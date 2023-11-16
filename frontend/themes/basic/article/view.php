<?php
/**
 * @var $model common\models\Article
 * @var $previousArticle common\models\Article
 * @var $nextArticle common\models\Article
 */

use yii\helpers\Url;
use kartik\markdown\Markdown;

$this->title = Yii::$app->params['site']['WEB_SITE_TITLE'] . '—' . $model->title;
$this->params['breadcrumbTitle'] = '文章';
?>
<div class="span9 blog-item">
    <div class="blog margin-bottom-30">
        <h3><?= $model->title?></h3>
        <ul class="unstyled inline blog-info">
            <li><i class="fa fa-calendar"></i> <?= Yii::$app->getFormatter()->asDatetime($model->created_at);?></li>
            <li><i class="fa fa-pencil"></i> Sun Xiaozhi</li>
            <li><i class='fa fa-eye'></i> <?= $model->page_views?></li>
            <!--<li><i class="fa fa-comments"></i> <a href="#">24 Comments</a></li>-->
        </ul>
        <ul class="unstyled inline blog-tags">
            <li>
                <i class="fa fa-tags"></i>
                <?php
                $article_tag = '';
                if (!empty($model->articleTag)) {
                    foreach ($model->articleTag as $key => $val) {
                        $article_tag .= "<a href='" . Url::to(['article/index', 'tid' => $val->id]) . "'>$val->name</a>";
                    }
                }

                echo $article_tag;
                ?>
            </li>
        </ul>
        <div class="blog-contents">
            <?= Markdown::convert($model->content) ?>
        </div>
    </div><!--/blog-->

    <div class="blog-skip">
        <?php
        if ($previousArticle != null) {
        ?>
        <span class="blog-skip-left"><a href="<?= Url::to(['article/view', 'id' => $previousArticle->id]) ?>"><i class="fa fa-angle-double-left"></i><?= $previousArticle->title?></a></span>
        <?php }?>
        <?php
        if ($nextArticle != null) {
        ?>
        <span class="blog-skip-right"><a href="<?= Url::to(['article/view', 'id' => $nextArticle->id]) ?>"><?= $nextArticle->title?><i class="fa fa-angle-double-right"></i></a></span>
        <?php }?>
    </div>

    <!-- Media -->
    <!--<div class="media">
        <h3 class="color-green">Comments</h3>
        <a class="pull-left" href="#">
            <img class="media-object" src="basic_assets/img/sliders/elastislide/2.jpg" alt="" />
        </a>
        <div class="media-body">
            <h4 class="media-heading">Media heading <span>5 hours ago / <a href="#">Reply</a></span></h4>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>

            <hr />

            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="basic_assets/img/sliders/elastislide/5.jpg" alt="" />
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Media heading <span>17 hours ago / <a href="#">Reply</a></span></h4>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                </div>
            </div>

            <hr />

            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="basic_assets/img/sliders/elastislide/11.jpg" alt="" />
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Media heading <span>2 days ago / <a href="#">Reply</a></span></h4>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                </div>
            </div>
        </div>
    </div>

    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="basic_assets/img/sliders/elastislide/9.jpg" alt="" />
        </a>
        <div class="media-body">
            <h4 class="media-heading">Media heading <span>July 5,2013 / <a href="#">Reply</a></span></h4>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        </div>
    </div>

    <hr />-->

    <!-- Leave a Comment -->
    <!--<div class="post-comment">
        <h3 class="color-green">Leave a Comment</h3>
        <form />
        <label>Name</label>
        <input type="text" class="span7" />
        <label>Email <span class="color-red">*</span></label>
        <input type="text" class="span7" />
        <label>Message</label>
        <textarea rows="8" class="span10"></textarea>
        <p><button type="submit" class="btn-u">Send Message</button></p>
        </form>
    </div>-->
    <!--/post-comment-->
</div><!--/span9-->