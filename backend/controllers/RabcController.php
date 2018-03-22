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
use yii\web\NotFoundHttpException;
use backend\models\search\RabcSearch;
use backend\models\Rabc;
use yii\rbac\Item;

class RabcController extends Controller
{
    /**
     * @var yii\rbac\DbManager
     */

    public $type = Item::TYPE_ROLE;

    public function actionIndex()
    {
        $searchModel = new RabcSearch();
        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate()
    {
        $model = new Rabc();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function findModel($id)
    {
        $authManager = Yii::$app->authManager;
        $item = $this->type === Item::TYPE_ROLE ? $authManager->getRole($id) : $authManager->getPermission($id);

        if ($item) {
            return new Rabc($item);
        } else {
            throw new NotFoundHttpException("The requested page does not exist.");
        }
    }


    /**
     * 创建角色
     * @throws \Exception
     */
    public function actionAddRole()
    {
        $role = Yii::$app->authManager->createRole('ceshi');

        $role->description = 'ceshi';

        Yii::$app->authManager->add($role);
    }

    /**
     * 创建规则
     * @throws \Exception
     */
    public function actionAddPermission()
    {
        $role = Yii::$app->authManager->createPermission('ceshi');

        //$role->description = 'ceshi';

        Yii::$app->authManager->add($role);
    }

    /**
     * 给角色分配权限
     */


    /**
     * 给用户分配权限
     */


    public function actionAuth()
    {
        /*@var yii\rbac\DbManager $auth*/

        $auth = \Yii::$app->authManager;
        // 删除全部
        $auth->removeAll();

        // 增加权限
        $postAdd = $auth->createPermission('postAdd');
        $postAdd->description = '文章添加';
        $auth->add($postAdd);
        $postDelete = $auth->createPermission('postDelete');
        $postDelete->description = '文章删除';
        $auth->add($postDelete);
        $postUpdate = $auth->createPermission('postUpdate');
        $postUpdate->description = '文章编辑';
        $auth->add($postUpdate);
        $postSelect = $auth->createPermission('postSelect');
        $postSelect->description = '文章查看';
        $auth->add($postSelect);

        // 增加角色
        $author = $auth->createRole('author');
        $auth->add($author);
        $reader = $auth->createRole('reader');
        $auth->add($reader);
        $editor = $auth->createRole('editor');
        $auth->add($editor);

        // 为角色赋予权限
        $auth->addChild($author, $postAdd);// 作者 添加文章
        $auth->addChild($author, $postUpdate);// 作者 编辑文章
        $auth->addChild($reader, $postSelect);// 读者 看文章
        $auth->addChild($editor, $postDelete);
        $auth->addChild($editor, $postSelect);
        $auth->addChild($editor, $author);
        $auth->addChild($editor, $reader);

        // 为用户分配角色
        $auth->assign($author, 2);
        $auth->assign($reader, 2);
        $auth->assign($reader, 3);
        $auth->assign($reader, 4);
        $auth->assign($editor, 5);
    }
}