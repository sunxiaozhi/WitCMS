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
     *  @inheritdoc
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

        $articleIdArr = $filterWhere = [];

        $breadcrumbTitle = '最新文章';
        $breadcrumbItem = '';

        if (!empty($tagId)) {
            $articleIdData = ArticleTagRelation::find()->joinWith('articleTag')->select([])->where(['tag_id' => $tagId])->all();
            if (!empty($articleIdData)) {
                foreach ($articleIdData as $key) {
                    array_push($articleIdArr, $key->article_id);
                    $breadcrumbItem = '标签：' . $key->articleTag->name;
                }

                $filterWhere = ['in', 'id', $articleIdArr];
                $breadcrumbTitle = '文章';
            }
        }

        if (!empty($categoryId)) {
            $filterWhere = ['category_id' => $categoryId];
            $breadcrumbTitle = '文章';
            $breadcrumbItem = '分类：';
        }

        $searchWhere = ['like', 'title', $search];

        if (!empty($search)) {
            $breadcrumbTitle = '文章';
            $breadcrumbItem = '搜索：' . $search;
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
        if( $model === null ) throw new NotFoundHttpException(Yii::t("frontend", "Article id {id} is not exists", ['id' => $id]));
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

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('common', 'The requested page does not exist.'));
    }
}
