<?php

namespace backend\controllers;

use Yii;
use common\models\FriendLink;
use backend\models\search\FriendLinkSearch;
use yii\filters\VerbFilter;

/**
 * FriendLinkController implements the CRUD actions for FriendLink model.
 */
class FriendLinkController extends BackendBaseController
{
    public function init()
    {
        $this->_model = new FriendLink();

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
     * Lists all FriendLink models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FriendLinkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
