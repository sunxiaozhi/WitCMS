<?php
/**
 * 后台基础控制器
 * User: sunxiaozhi
 * Date: 2019/10/27 21:13
 */

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BackendBaseController extends Controller
{
    /**
     * 模型
     *
     * @var $_model \yii\db\BaseActiveRecord
     */
    protected $_model = null;

    /**
     * 查看
     *
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * 创建
     *
     * @return string|\yii\web\Response
     *
     * @var $model \yii\db\ActiveRecord
     */
    public function actionCreate()
    {
        //实例化模型
        $model = new $this->_model();

        //加载默认值
        $model->loadDefaultValues();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * 更新
     *
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * 删除
     *
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * 查找数据模型
     *
     * @param $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if ($this->_model === null) {
            throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        }

        if (($model = $this->_model->findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
    }
}