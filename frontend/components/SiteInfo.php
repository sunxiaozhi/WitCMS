<?php
/**
 * Created by PhpStorm.
 * User: sunxiaozhi
 * Date: 2018/9/18
 * Time: 21:59
 */

namespace frontend\components;

use yii\base\Component;
use common\models\Article as ArticleModel;
use common\models\ArticleTag;
use common\models\ArticleCategory;
use common\models\Comments;

class SiteInfo extends Component
{
    /**
     * 获取文章的总数
     * @return int|string
     */
    public function getArticleCount() {
        return ArticleModel::find()->count();
    }

    /**
     * 文章标签总数
     * @return int|string
     */
    public function getTagCount() {
        return ArticleTag::find()->count();
    }

    /**
     * 文章分类总数
     * @return int|string
     */
    public function getCategoryCount() {
        return ArticleCategory::find()->count();
    }

    /**
     * 文章评论总数
     * @return int|string
     */
    public function getCommentCount() {
        return Comments::find()->count();
    }


    public function getRunningDays() {
        return 1000;
    }
}