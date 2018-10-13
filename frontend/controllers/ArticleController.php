<?php

namespace frontend\controllers;

use common\models\ArticleTagRelation;
use Yii;
use common\models\Article;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $tagId = Yii::$app->getRequest()->get('tid');
        $categoryId = Yii::$app->getRequest()->get('cid');
        $search = Yii::$app->getRequest()->get('search');

        $where = ['status' => Article::STATUS_YES];

        $articleIdArr = $filterWhere = $searchWhere = [];

        $breadcrumbTitle = Yii::t('frontend', 'Latest Articles');
        $breadcrumbItem = '';

        //标签搜索
        if (!empty($tagId)) {
            $articleIdData = ArticleTagRelation::find()->joinWith('articleTag')->select([])->where(['tag_id' => $tagId])->all();
            if (!empty($articleIdData)) {
                foreach ($articleIdData as $key) {
                    array_push($articleIdArr, $key->article_id);
                    $breadcrumbItem = Yii::t('frontend', 'Tag') . '：' . $key->articleTag->name;
                }

                $filterWhere = ['in', 'id', $articleIdArr];
            }
        }

        //分类搜索
        if (!empty($categoryId)) {
            $filterWhere = ['category_id' => $categoryId];
            $breadcrumbItem = Yii::t('frontend', 'Category') . '：';
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
            'query' => Article::find()->where($where)->andFilterWhere($filterWhere)->andFilterWhere($searchWhere)->orderBy('id desc'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'breadcrumbTitle' => $breadcrumbTitle,
            'breadcrumbItem' => $breadcrumbItem,
        ]);
    }

    /**
     * Displays a single Article model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = Article::findOne(['id' => $id, 'type' => Article::ARTICLE, 'status' => Article::STATUS_YES]);
        if ($model === null) throw new NotFoundHttpException(Yii::t("frontend", "Article id {id} is not exists", ['id' => $id]));

        //获取前一篇文章
        $prev = Article::find()
            ->where(['category_id' => $model->category_id])
            ->andWhere(['>', 'id', $id])
            ->orderBy("sort asc,created_at desc,id desc")
            ->limit(1)
            ->one();

        //获取后一篇文章
        $next = Article::find()
            ->where(['category_id' => $model->category_id])
            ->andWhere(['<', 'id', $id])
            ->orderBy("sort desc,created_at desc,id asc")
            ->limit(1)
            ->one();

        return $this->render('view', [
            'model' => $model,
            'prev' => $prev,
            'next' => $next,
        ]);
    }
}
