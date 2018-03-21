<?php
/**
 * Created by PhpStorm.
 * User: sunxiaozhi
 * Date: 2018/3/21
 * Time: 21:10
 */

namespace backend\controllers;

use yii\web\Controller;
use Yii;
use yii\data\ArrayDataProvider;

class RabcController extends Controller
{
    /**
     * @var yii\rbac\DbManager
     */

    public function actionIndex()
    {
        $role = Yii::$app->authManager->getRoles();

       /* $dataProvider = $provider = new ArrayDataProvider([
            'allModels' => $role,
            'sort' => [
                'attributes' => ['id', 'username', 'email'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);*/

        //print_r($dataProvider->getModels());exit;

        //print_r($dataProvider);exit;

        /*$this->render('index', [
            'dataProvider' => $dataProvider
        ]);*/
    }

    public function actionAdd()
    {
        $role = Yii::$app->authManager->createRole('editor');

        Yii::$app->authManager->add($role);
    }

}