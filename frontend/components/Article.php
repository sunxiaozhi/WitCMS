<?php
/**
 * Author: sxz
 * Function:文章组件
 * Blog: http://www.sunhuanzhi.com
 * Email: zhi8023nan@126.com
 * Created at: 2017-08-17 14:34
 */

namespace frontend\components;

use yii\base\Object;
use yii\data\ActiveDataProvider;
use common\models\Article as ArticleModel;
use common\models\ArticleTag;
use common\models\ArticleTagRelation;

class Article extends Object
{
    /**
     * 根据点击量获取文章列表
     *
     * @param integer $limit 要取的文章数目
     * @param string $cid 分类id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getArticleByClick($limit, $cid = '')
    {
        return self::_getArticleList("scan_count desc", $limit, $cid, []);
    }

    /**
     * 获取最新文章列表
     *
     * @param integer $limit 要取的文章数目
     * @param string $cid 分类id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getArticleByLatest($limit, $cid = '')
    {
        return self::_getArticleList("id desc", $limit, $cid, []);
    }

    /**
     * 获取flag_recommend文章列表
     *
     * @param $limit
     * @param string $cid
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getArticleByFlagRecommend($limit, $cid = '')
    {
        return self::_getArticleList("id desc", $limit, $cid = '', ['flag_recommend' => 1]);
    }

    /**
     * 获取flag_picture文章列表
     *
     * @param $limit
     * @param string $cid
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getArticleByFlagPicture($limit, $cid = '')
    {
        return self::_getArticleList("id desc", $limit, $cid = '', ['flag_picture' => 1]);
    }

    /**
     * 根据排序、分类等获取文章列表
     *
     * @param $sort
     * @param $limit
     * @param $cid
     * @param array $where
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function _getArticleList($sort, $limit, $cid, $where = [])
    {
        if ($cid != '') {
            $where['cid'] = $cid;
        }
        $where['status'] = ArticleModel::STATUS_YES;
        //$where['type'] = ArticleModel::ARTICLE;
        return ArticleModel::find()->joinWith("category")->orderBy($sort)->where($where)->select([
            'article.id id',
            'cid',
            'title',
            'thumb'
        ])->limit($limit)->asArray()->all();
    }

    /**
     * 获取文章标签（只取存在文章的标签）
     *
     * @param int $limit
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getTags($limit = 14, $where = [])
    {
        return ArticleTagRelation::find()->joinWith('articleTag')->select([])->where($where)->limit($limit)->groupBy(['tag_id'])->all();
    }

    /**
     * 获取文章列表ActiveDataProvider
     *
     * @param array $where
     * @return \yii\data\ActiveDataProvider
     */
    public static function getArticleList($where = [])
    {
        $where = array_merge($where, ['type' => ArticleModel::ARTICLE]);
        $query = ArticleModel::find()->select([])->where($where);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'sort' => SORT_ASC,
                    'id' => SORT_DESC,
                ]
            ]
        ]);
        return $dataProvider;
    }

    /**
     * 获取文章列表
     *
     * @param $where
     * @param int $limit
     * @param string $order
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getArticleLists($where, $limit = 4, $order = 'id desc')
    {
        $where = array_merge($where, ['type' => ArticleModel::ARTICLE]);
        //return ArticleModel::find()->joinWith('category')->select([])->where($where)->orderBy($order)->limit($limit)->all();
        return ArticleModel::find()->select([])->where($where)->orderBy($order)->limit($limit)->all();
    }
}