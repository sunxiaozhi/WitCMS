<?php
/**
 * 文章列表小部件视图.
 * User: sunxiaozhi
 * Date: 2019/5/28 9:53
 */

/* @var $model \common\models\Article */

use common\helpers\Url;
use yii\helpers\Html;
use yii\helpers\StringHelper;
?>

<div class='blog margin-bottom-30'>
    <h3><?= Html::encode($model->title) ?></h3>
    <ul class='unstyled inline blog-info'>
        <li><i class='fa fa-calendar'></i><?= Yii::$app->getFormatter()->asDatetime($model->created_at) ?></li>
        <li><i class='fa fa-pencil'></i> Sun Xiaozhi</li>
        <li><i class='fa fa-eye'></i><?= $model->page_views ?></li>
        <!--<li><i class='fa fa-comments'></i> <a href='#'>24 Comments</a></li>-->
    </ul>
    <ul class='unstyled inline blog-tags'>
        <li>
            <i class='fa fa-tags'></i>
            <?php
                foreach ($model->articleTag as $key => $val) {
                    echo "<a href='" . Url::to(['article/index', 'tid' => $val->id]) . "'>$val->name</a>";
                }
            ?>
        </li>
    </ul>
    <!--<div class='blog-img'><img src='{article_thumb}' alt='' /></div>-->
    <p style='margin-top: 10px'><?= StringHelper::truncate($model->abstract, 120);?></p>
    <p style='float: right'><a class='btn-u btn-u-small' href='<?= Url::to(['article/view', 'id' => $model->id])?>'>阅读更多</a></p>
</div>