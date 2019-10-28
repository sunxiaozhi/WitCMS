<?php

namespace backend\controllers;

use Yii;
use common\models\ArticleCategory;
use backend\models\search\ArticleCategorySearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\helpers\Tree;

/**
 * ArticleCategoryController implements the CRUD actions for ArticleCategory model.
 */
class ArticleCategoryController extends BackendBaseController
{
    public function init()
    {
        $this->_model = new ArticleCategory();

        parent::init();
    }

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

            $articleCategoriesTree = new Tree($articleCategories);

            return $this->render('create', [
                'model' => $model,
                'treeArr' => $articleCategoriesTree->getTree(),
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

            $articleCategoriesTree = new Tree($articleCategories);

            return $this->render('update', [
                'model' => $model,
                'treeArr' => $articleCategoriesTree->getTree(),
            ]);
        }
    }
}
