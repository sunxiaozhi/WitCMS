<?php
use yii\helpers\Url;
use frontend\components\Article;
?>

<div class="span3">
    <!-- Search Bar -->
    <div class="headline"><h3><?= Yii::t('frontend', 'Search Bar')?></h3></div>
    <div class="input-append  margin-bottom-20">
        <input type="text" class="span9" />
        <button type="button" class="btn-u"><?= Yii::t('frontend', 'Search')?></button>
    </div>

    <!-- Posts -->
    <div class="posts margin-bottom-20">
        <div class="headline"><h3><?= Yii::t('frontend','Recommend Article')?></h3></div>
        <?php
        $articles = Article::getArticleLists(['status' => 1, 'is_recommend' => '1']);
        foreach ($articles as $article) {
            $url = Url::to(['article/view', 'id' => $article->id]);
            echo '<dl class="dl-horizontal">
                    <dt><a href="' . $url .'"><img src="basic_assets/img/sliders/elastislide/11.jpg" alt="" /></a></dt>
                    <dd>
                        <p><a href="' . $url .'">' . $article->title . '</a></p>
                    </dd>
                </dl>';
        }
        ?>
    </div><!--/posts-->

    <!-- Blog Tags -->
    <div class="headline"><h3><?= Yii::t('frontend', 'Hot Tags')?></h3></div>
    <ul class="unstyled inline blog-tags">
        <?php
        $tags = Article::getTags(14);
        foreach ($tags as $tag) {
            $url = Url::to(['article/index', 'tid' => $tag->articleTag->id]);
            echo '<li><a href="' . $url . '"><i class="icon-tags"></i> '  . $tag->articleTag->name . '</a></li>';
        }
        ?>
    </ul>

    <!-- Tabs Widget -->
    <div class="headline"><h3>Tabs Widget</h3></div>
    <ul class="nav nav-tabs tabs">
        <li class="active"><a href="#home" data-toggle="tab">First Tab</a></li>
        <li><a href="#profile" data-toggle="tab">Second Tab</a></li>
    </ul><!--/tabs-->

    <div class="tab-content">
        <div class="tab-pane active" id="home">
            <p>Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Pellentesque fermentum, Vivamus  felis consectetur eget orci metus.</p>
        </div>
        <div class="tab-pane" id="profile">
            <p>Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc.</p>
        </div>
    </div><!--/tab-content-->

    <!-- Blog Latest Tweets -->
    <!--<div class="blog-twitter">
        <div class="headline"><h3><?/*= Yii::t('frontend', 'Latest Comment')*/?></h3></div>
        <p><a href="">@htmlstream</a> At vero eos et accusamus et iusto odio dignissimos. <a href="#">http://t.co/sBav7dm</a> <span>5 hours ago</span></p>
        <p><a href="">@unify</a> At vero eos et accusamus et iusto odio dignissimos. <a href="#">http://t.co/f58Ddg4</a> <span>8 hours ago</span></p>
        <p><a href="">@veroeos</a> At vero eos et accusamus et iusto odio dignissimos. <a href="#">http://t.co/adVs9f</a> <span>17 hours ago</span></p>
        <p><a href="">@accusamus </a> At vero eos et accusamus et iusto odio dignissimos. <a href="#">http://t.co/wf5Fs6</a> <span>23 hours ago</span></p>
        <p><a href="">@veroeoset</a> At vero eos et accusamus et iusto odio dignissimos. <a href="#">http://t.co/7EsffP</a> <span>1 day ago</span></p>
    </div>-->
</div>