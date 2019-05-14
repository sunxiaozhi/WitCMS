<?php
/**
 * 获取网站信息
 * Author: sunxiaozhi
 * Date: 2018/10/8 16:36
 */

namespace common\components;

use Yii;
use common\models\FriendLink;
use yii\base\Component;
use common\models\Article as ArticleModel;
use common\models\ArticleTag;
use common\models\ArticleCategory;
use common\models\Comments;
use common\helpers\Date;

class SiteInfo extends Component
{
    /**
     * 获取文章的总数
     * @return int|string
     */
    public function getArticleCount()
    {
        return ArticleModel::find()->count();
    }

    /**
     * 文章标签总数
     * @return int|string
     */
    public function getTagCount()
    {
        return ArticleTag::find()->count();
    }

    /**
     * 文章分类总数
     * @return int|string
     */
    public function getCategoryCount()
    {
        return ArticleCategory::find()->count();
    }

    /**
     * 文章评论总数
     * @return int|string
     */
    public function getCommentCount()
    {
        return Comments::find()->count();
    }

    /**
     * 友情链接总数
     * @return int|string
     */
    public function getFriendLinkCount()
    {
        return FriendLink::find()->count();
    }

    /**
     * 获取网站的运行时间
     * @return string
     * @throws \Exception
     */
    public function getRunningDays()
    {
        $startDate = '2018-11-13';
        return Date::diffDate($startDate);
    }

    public function getSiteAllInfo()
    {
        $siteAllInfo = [
            'articleCount' => 0,
            'articleTagCount' => 0,
            'CommemtCount' => 0,
            'friendLinkCount' => 0,
            'runningDays' => '1 天',
        ];

        $cache = Yii::$app->getCache();
        $siteAllInfo = $cache->get('siteAllInfo');

        if ($siteAllInfo === false) {

        }

        return $siteAllInfo;
    }
}