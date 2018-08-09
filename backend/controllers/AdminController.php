<?php

namespace backend\controllers;

use Yii;
use common\models\Admin;
use backend\models\search\AdminSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminController implements the CRUD actions for Admin model.
 */
class AdminController extends Controller
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
     * Lists all Admin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdminSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Admin model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Admin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Admin();

        if (Yii::$app->getRequest()->getIsPost()) {
            if ($model->load(Yii::$app->request->post())) {
                if ($user = $model->adminSave()) {
                    return $this->redirect(['index']);
                }
            }
        }

        $model->status = 10;

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Admin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->getRequest()->getIsPost()) {
            if ($model->load(Yii::$app->request->post())) {
                if ($user = $model->adminSave()) {
                    return $this->redirect(['index']);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Admin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Admin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Admin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Admin::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
    }

    /**
     * 用户授权
     * @param $id
     * @return string
     * @throws \Exception
     */
    public function actionAccredit($id)
    {
        $auth = Yii::$app->authManager;
        /* 获取用户信息 */
        $model = Admin::findOne($id);

        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            /* 用户权限组 */
            $item_name = $data['param'];

            /* 先删除 用户组-用户 记录 */
            $auth->revokeAll($id);
            /* 再添加记录 */
            $role = $auth->getRole($item_name);

            $auth->assign($role, $id);

            $this->redirect(['index']);
        }

        /* 获取所有权限组 */
        $roles = $auth->getRoles();
        /* 获取该用户的权限 */
        $group = array_keys($auth->getAssignments($id));

        return $this->render('accredit', [
            'model' => $model,
            'roles' => $roles,
            'group' => $group
        ]);
    }
}
