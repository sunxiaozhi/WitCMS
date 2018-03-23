<?php

namespace backend\controllers;

use Yii;
use common\models\Menu;
use backend\models\search\MenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\helpers\Tree;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class FrontendMenuController extends Controller
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
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MenuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, Menu::FRONTEND_MENU_TYPE);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Menu model.
     * @param string $id
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
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Menu();

        $model->type = Menu::FRONTEND_MENU_TYPE;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index']);
        } else {
            $model->parent_id = Yii::$app->request->get('parent_id', 0);
            $arr = Menu::find()->where(['type' => Menu::FRONTEND_MENU_TYPE])->asArray()->all();
            $treeObj = new Tree($arr);
            //print_r($treeObj->getTree());exit;
            return $this->render('create', [
                'model' => $model,
                'treeArr' => $treeObj->getTree(),
            ]);
        }

        /*return $this->render('create', [
            'model' => $model,
        ]);*/
    }

    /**
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index']);
        } else {
            $arr = Menu::find()->where(['type' => Menu::FRONTEND_MENU_TYPE])->asArray()->all();
            $treeObj = new Tree($arr);
            return $this->render('update', [
                'model' => $model,
                'treeArr' => $treeObj->getTree(),
            ]);
        }

        /*return $this->render('update', [
            'model' => $model,
        ]);*/
    }

    /**
     * Deletes an existing Menu model.
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
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
    }
}
