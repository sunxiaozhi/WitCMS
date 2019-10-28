<?php
/**
 * 权限控制器.
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
use backend\models\AuthRule;
use common\models\Menu;
use backend\helpers\Tree;

class RabcController extends Controller
{
    /**
     * @var yii\rbac\DbManager
     */

    public $type = Item::TYPE_ROLE;

    /**
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RabcSearch();
        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * @return string
     */
    public function actionCreate()
    {
        $model = new Rabc(null);

        $model->type = $this->type;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        Yii::$app->authManager->remove($model->item);
        return $this->redirect(['index']);
    }

    /**
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

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return Rabc
     * @throws NotFoundHttpException
     */
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


    public function actionAuth($id)
    {
        $authManager = Yii::$app->authManager;
        if (Yii::$app->request->isPost) {
            $rules = Yii::$app->request->post('rules', []);
            if (!$role = $authManager->getRole($id)) {
                Yii::$app->session->setFlash('error', '角色不存在');
            }
            //删除角色所有child
            $authManager->removeChildren($role);
            foreach ($rules as $rule) {

                //auth_rule表
                $ruleModel = new AuthRule();
                $ruleModel->name = $rule;
                $ruleModel->save();

                //auth_item表
                $itemModel = new Rabc($authManager->getPermission($rule));
                $itemModel->name = $rule;
                $itemModel->type = Item::TYPE_PERMISSION;
                $itemModel->ruleName = $rule;
                $itemModel->save();

                //auth_item_child表
                if (!$authManager->hasChild($role, $itemModel)) {
                    $authManager->addChild($role, $itemModel);
                }
            }
            Yii::$app->session->setFlash('success', '操作成功');
        }
        $arr = Menu::find()->where(['type' => Menu::BACKEND_MENU_TYPE])->asArray()->all();
        $treeObj = new Tree($arr);
        $authRules = $authManager->getChildren($id);
        $authRules = array_keys($authRules); //var_dump($authRules); exit();
        //var_dump($treeObj->getTreeArray()); exit();
        return $this->render('auth', [
            'treeArr' => $treeObj->getTreeArray(),
            'authRules' => $authRules,
            'role' => $id,
        ]);
    }

    public function actionAuth_test()
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