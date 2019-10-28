<?php

namespace backend\controllers;

use Yii;
use common\models\Menu;
use backend\models\search\MenuSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\helpers\Tree;

/**
 * BackendMenuController implements the CRUD actions for Menu model.
 */
class BackendMenuController extends BackendBaseController
{
    public function init()
    {
        $this->_model = new Menu();

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
     * 后台菜单列表
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MenuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, Menu::BACKEND_MENU_TYPE);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 后台菜单创建
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Menu();

        //后台菜单类型
        $model->type = Menu::BACKEND_MENU_TYPE;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            //排序默认0
            $model->sort = 0;

            //状态默认显示
            $model->status = 1;

            //后台菜单父id
            $model->parent_id = Yii::$app->request->get('parent_id', 0);

            //获取后台菜单
            $Menus = Menu::find()->where(['type' => Menu::BACKEND_MENU_TYPE])->asArray()->all();

            $menuTree = new Tree($Menus);

            return $this->render('create', [
                'model' => $model,
                'treeArr' => $menuTree->getTree(),
            ]);
        }
    }

    /**
     * 后台菜单更新
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
            //获取后台菜单
            $Menus = Menu::find()->where(['type' => Menu::BACKEND_MENU_TYPE])->asArray()->all();

            $menuTree = new Tree($Menus);

            return $this->render('update', [
                'model' => $model,
                'treeArr' => $menuTree->getTree(),
            ]);
        }
    }
}
