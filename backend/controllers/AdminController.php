<?php

namespace backend\controllers;

use Yii;
use common\models\Admin;
use backend\models\search\AdminSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminController implements the CRUD actions for Admin model.
 */
class AdminController extends BackendBaseController
{
    public function init()
    {
        $this->_model = new Admin();

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
     * 创建管理员.
     *
     * @return string|\yii\web\Response
     * @throws \yii\base\Exception
     */
    /*public function actionCreate()
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
    }*/

    /**
     * 更新管理员.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     *
     * @var $model \common\models\Admin
     */
    /*public function actionUpdate($id)
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
    }*/

    /**
     * 修改管理员密码
     *
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionChangePassword($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->getRequest()->getIsPost()) {
            if ($model->load(Yii::$app->request->post())) {
                if ($user = $model->adminSave()) {
                    return $this->redirect(['index']);
                }
            }
        }

        return $this->render('change-password', [
            'model' => $model,
        ]);
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
