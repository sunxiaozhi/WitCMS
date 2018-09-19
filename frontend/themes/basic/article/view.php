<?php
use yii\helpers\Url;
?>
<div class="span9 blog-item">
    <div class="blog margin-bottom-30">
        <h3><?= $model->title?></h3>
        <ul class="unstyled inline blog-info">
            <li><i class="icon-calendar"></i> February 02, 2013</li>
            <li><i class="icon-pencil"></i> Diana Anderson</li>
            <li><i class="icon-comments"></i> <a href="#">24 Comments</a></li>
        </ul>
        <ul class="unstyled inline blog-tags">
            <li>
                <i class="icon-tags"></i>
                <?php
                $article_tag = '';
                if (!empty($model->articleTag)) {
                    foreach ($model->articleTag as $key => $val) {
                        $article_tag .= "<a href='" . Url::to(['search/index', 'q' => $val->name]) . "'>$val->name</a>";
                    }
                }

                echo $article_tag;
                ?>

                <!--<a href="#">Technology</a>
                <a href="#">Education</a>
                <a href="#">Internet</a>
                <a href="#">Media</a>-->
            </li>
        </ul>
        <div class="blog-img"><img src="basic_assets/img/posts/1.jpg" alt="" /></div>
        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.</p>

        <blockquote class="hero">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit posuere erat a ante.</p>
            <small>Someone famous <cite title="Source Title">Source Title</cite></small>
        </blockquote>

        <p>Accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.</p>
    </div><!--/blog-->

    <hr />

    <!-- Media -->
    <div class="media">
        <h3 class="color-green">Comments</h3>
        <a class="pull-left" href="#">
            <img class="media-object" src="basic_assets/img/sliders/elastislide/2.jpg" alt="" />
        </a>
        <div class="media-body">
            <h4 class="media-heading">Media heading <span>5 hours ago / <a href="#">Reply</a></span></h4>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>

            <hr />

            <!-- Nested media object -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="basic_assets/img/sliders/elastislide/5.jpg" alt="" />
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Media heading <span>17 hours ago / <a href="#">Reply</a></span></h4>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                </div>
            </div><!--/media-->

            <hr />

            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="basic_assets/img/sliders/elastislide/11.jpg" alt="" />
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Media heading <span>2 days ago / <a href="#">Reply</a></span></h4>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                </div>
            </div><!--/media-->
        </div>
    </div><!--/media-->

    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="basic_assets/img/sliders/elastislide/9.jpg" alt="" />
        </a>
        <div class="media-body">
            <h4 class="media-heading">Media heading <span>July 5,2013 / <a href="#">Reply</a></span></h4>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        </div>
    </div><!--/media-->

    <hr />

    <!-- Leave a Comment -->
    <div class="post-comment">
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
    </div><!--/post-comment-->
</div><!--/span9-->