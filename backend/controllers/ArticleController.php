<?php

namespace backend\controllers;

use Yii;
use backend\models\Article;
use common\models\ArticleCategory;
use backend\models\search\ArticleSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\helpers\Tree;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends BackendBaseController
{
    public function init()
    {
        $this->_model = new Article();

        parent::init();
    }

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
     * 文章列表
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 文章创建
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            $arr = ArticleCategory::find()->asArray()->all();
            $treeObj = new Tree($arr);

            //文章默认状态
            $model->status = Article::STATUS_YES;

            return $this->render('create', [
                'model' => $model,
                'treeArr' => $treeObj->getTree(),
            ]);
        }
    }

    /**
     * 文章更新
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
            //处理文章标签
            $articleTagArr = [];
            foreach ($model->articleTag as $key => $val) {
                $articleTagArr[] = $val->name;
            }

            $model->tag = implode(',', $articleTagArr);

            $arr = ArticleCategory::find()->asArray()->all();
            $treeObj = new Tree($arr);

            return $this->render('update', [
                'model' => $model,
                'treeArr' => $treeObj->getTree(),
            ]);
        }
    }

    /**
     * 文章删除
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
}
