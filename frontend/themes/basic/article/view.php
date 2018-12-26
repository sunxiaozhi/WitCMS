<?php
/**
 * @var $model common\models\Article
 * @var $prev common\models\Article
 * @var $next common\models\Article
 */

//use Yii;
use yii\helpers\Url;
use kartik\markdown\Markdown;

$this->title = $model->name;
$this->params['breadcrumbTitle'] = '文章';
?>
<div class="span9 blog-item">
    <div class="blog margin-bottom-30">
        <h3><?= $model->title?></h3>
        <ul class="unstyled inline blog-info">
            <li><i class="icon-calendar"></i> <?= Yii::$app->getFormatter()->asDatetime($model->created_at);?></li>
            <li><i class="icon-pencil"></i> Sun Xiaozhi</li>
            <li><i class='icon-eye-open'></i> <?= $model->page_views?></li>
            <!--<li><i class="icon-comments"></i> <a href="#">24 Comments</a></li>-->
        </ul>
        <ul class="unstyled inline blog-tags">
            <li>
                <i class="icon-tags"></i>
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
        <div style="margin-top: 20px">
            <?= Markdown::convert($model->content) ?>
        </div>
    </div><!--/blog-->

    <hr />

    <div>
        <?php
        if ($prev != null) {
        ?>
        <p>上一篇：<a href="<?= Url::to(['article/view', 'id' => $prev->id]) ?>"><?= $prev->title?></a></p>
        <?php } else { ?>
            <p>上一篇：没有了</p>
        <?php }?>
        <?php
        if ($next != null) {
        ?>
        <p>下一篇：<a href="<?= Url::to(['article/view', 'id' => $next->id]) ?>"><?= $next->title?></a></p>
        <?php } else { ?>
            <p>下一篇：没有了</p>
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