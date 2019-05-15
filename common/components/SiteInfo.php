<?php
/**
 * 获取网站信息
 * Author: sunxiaozhi
 * Date: 2018/10/8 16:36
 */

namespace common\components;

use Yii;
use yii\base\Component;
use common\helpers\Date;
use common\models\Article;
use common\models\Comments;
use common\models\ArticleTag;
use common\models\FriendLink;
use yii\caching\FileDependency;
use common\models\ArticleCategory;
use common\helpers\DependencyFileHelper;

class SiteInfo extends Component
{
    /**
     * 获取网站信息
     * @return array|mixed
     * @throws \Exception
     */
    public function getSiteAllInfo()
    {
        $cache = Yii::$app->getCache();
        $siteAllInfo = $cache->get('siteAllInfo');

        if ($siteAllInfo === false) {
            $startDay = Yii::$app->params['site']['WEB_START_DAY'];

            $articleCount = Article::find()->count();
            $articleTagCount = ArticleTag::find()->count();
            $articleCategoryCount = ArticleCategory::find()->count();
            $CommemtCount = Comments::find()->count();
            $friendLinkCount = FriendLink::find()->count();
            $runningDays = Date::diffDate($startDay);

            $siteAllInfo = [
                'articleCount' => $articleCount,
                'articleTagCount' => $articleTagCount,
                'articleCategoryCount' => $articleCategoryCount,
                'CommemtCount' => $CommemtCount,
                'friendLinkCount' => $friendLinkCount,
                'runningDays' => $runningDays,
            ];

            $dependencyFileHelper = Yii::createObject([
                    'class' => DependencyFileHelper::className(),
                    'dependencyFileName' => 'siteAllInfo.txt',
                ]
            );

            $dependencyFileName = $dependencyFileHelper->createDependencyFile();

            $dependency = new FileDependency(['fileName' => $dependencyFileName]);

            $cache->set('siteAllInfo', $siteAllInfo, 0, $dependency);
        }

        $siteAllInfoDefault = [
            'articleCount' => 0,
            'articleTagCount' => 0,
            'articleCategoryCount' => 0,
            'CommemtCount' => 0,
            'friendLinkCount' => 0,
            'runningDays' => '1 天',
        ];

        return $siteAllInfo ? $siteAllInfo : $siteAllInfoDefault;
    }
}