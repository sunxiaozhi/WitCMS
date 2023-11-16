<?php
/**
 * 文章控制器
 * Author: sunxiaozhi
 * Date: 2018/10/13 11:59
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Article;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use common\models\ArticleTagRelation;
use common\models\ArticleCategory;

class ArticleController extends Controller
{
    /**
     * 文章列表页
     * @return mixed
     */
    public function actionIndex()
    {
        //标签id
        $tagId = Yii::$app->getRequest()->get('tid');

        //分类id
        $categoryId = Yii::$app->getRequest()->get('cid');

        //搜索词
        $search = Yii::$app->getRequest()->get('search');

        //查询条件
        $where = ['status' => Article::STATUS_YES];

        //文章id数组       查询条件        查询条件
        $articleIdArray = $filterWhere = $searchWhere = [];

        //面包屑导航
        $breadcrumbTitle = Yii::t('frontend', 'Latest Articles');
        $breadcrumbItem = '';

        //标签搜索
        if (!empty($tagId)) {
            //所有文章标签数据
            $allArticleTagData = ArticleTagRelation::find()
                ->joinWith('articleTag')
                ->select([])
                ->where(['tag_id' => $tagId])
                ->all();

            if (!empty($allArticleTagData)) {
                /* @var $articleTagData \common\models\ArticleTagRelation */
                foreach ($allArticleTagData as $articleTagData) {
                    array_push($articleIdArray, $articleTagData->article_id);
                    $breadcrumbItem = Yii::t('frontend', 'Tag') . '：' . $articleTagData->articleTag->name;
                }

                $filterWhere = ['in', 'id', $articleIdArray];
            }
        }

        //分类搜索
        if (!empty($categoryId)) {
            //查询分类信息
            $articleCategoryData = ArticleCategory::findOne($categoryId);

            $filterWhere = ['category_id' => $categoryId];
            $breadcrumbItem = Yii::t('frontend', 'Category') . '：无';

            if (!empty($articleCategoryData)) {
                $breadcrumbItem = Yii::t('frontend', 'Category') . '：' . $articleCategoryData->name;
            }
        }

        //搜索词搜索
        if (!empty($search)) {
            $searchWhere = ['like', 'title', $search];
            $breadcrumbItem = Yii::t('frontend', 'Search') . '：' . $search;
        }

        //次标题判断
        if (!empty($tagId) || !empty($categoryId) || !empty($search)) {
            $breadcrumbTitle = Yii::t('frontend', 'Article');
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Article::find()
                ->select('id,title,abstract,page_views,created_at')
                ->where($where)
                ->andFilterWhere($filterWhere)
                ->andFilterWhere($searchWhere)
                ->orderBy('id desc'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'breadcrumbTitle' => $breadcrumbTitle,
            'breadcrumbItem' => $breadcrumbItem,
        ]);
    }

    /**
     * 文章详情页
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = Article::findOne(['id' => $id, 'type' => Article::ARTICLE, 'status' => Article::STATUS_YES]);

        if ($model === null) {
            throw new NotFoundHttpException(Yii::t("frontend", "Article id {id} is not exists", ['id' => $id]));
        }

        //更新文章浏览量
        Article::updateAllCounters(['page_views' => 1], ['id' => $id]);

        //获取前一篇文章
        $previousArticle = Article::find()
            ->where(['category_id' => $model->category_id])
            ->andWhere(['>', 'id', $id])
            ->select(['id', 'title'])
            ->orderBy("sort asc,created_at desc,id desc")
            ->limit(1)
            ->one();

        //获取后一篇文章
        $nextArticle = Article::find()
            ->where(['category_id' => $model->category_id])
            ->andWhere(['<', 'id', $id])
            ->select(['id', 'title'])
            ->orderBy("sort desc,created_at desc,id asc")
            ->limit(1)
            ->one();

        return $this->render('view', [
            'model' => $model,
            'previousArticle' => $previousArticle,
            'nextArticle' => $nextArticle,
        ]);
    }
}
