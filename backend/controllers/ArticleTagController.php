<?php

namespace backend\controllers;

use Yii;
use common\models\ArticleTag;
use backend\models\search\ArticleTagSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleTagController implements the CRUD actions for ArticleTag model.
 */
class ArticleTagController extends BackendBaseController
{
    public function init()
    {
        $this->_model = new ArticleTag();

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
     * 文章标签列表
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleTagSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
