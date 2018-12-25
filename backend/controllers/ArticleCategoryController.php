<?php

namespace backend\controllers;

use Yii;
use common\models\ArticleCategory;
use backend\models\search\ArticleCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\helpers\Tree;

/**
 * ArticleCategoryController implements the CRUD actions for ArticleCategory model.
 */
class ArticleCategoryController extends Controller
{
    /**
     * {@inheritdoc}
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
     * 文章分类列表
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 文章分类创建
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArticleCategory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            //排序默认0
            $model->sort = 0;

            //文章分类父id
            $model->parent_id = Yii::$app->request->get('parent_id', 0);

            //获取文章分类
            $articleCategories = ArticleCategory::find()->asArray()->all();

            $articleCategorieTree = new Tree($articleCategories);

            return $this->render('create', [
                'model' => $model,
                'treeArr' => $articleCategorieTree->getTree(),
            ]);
        }
    }

    /**
     * 文章分类更新
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            //获取文章分类
            $articleCategories = ArticleCategory::find()->asArray()->all();

            $articleCategorieTree = new Tree($articleCategories);

            return $this->render('update', [
                'model' => $model,
                'treeArr' => $articleCategorieTree->getTree(),
            ]);
        }
    }

    /**
     * 文章分类删除
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
     * 根据主键值查找文章分类模型
     * @param string $id
     * @return ArticleCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArticleCategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
    }
}
