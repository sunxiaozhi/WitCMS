<?php

namespace backend\behaviors;

use Yii;
use yii\base\Controller;
use common\models\Menu;
use yii\web\ForbiddenHttpException;

/**
 * 使用方法：
 * 'as rbac' => [
 *     'class' => 'backend\behaviors\RbacBehavior',
 *     'allowActions' => ['site/login', 'site/error']
 * ]
 */
class RbacBehavior extends \yii\base\Behavior
{
    /**
     * @var array 无需权限检查的action
     */
    public $allowActions = [];

    /**
     * @return array
     */
    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => 'rbacAction',
        ];
    }

    /**
     * @param $event
     * @return bool
     * @throws ForbiddenHttpException
     *
     * @var $enent \yii\base\ActionEvent
     */
    public function rbacAction($event)
    {
        $event->isValid = true; // 继续执行action
        $action = $event->action;
        $rule = $action->getUniqueId();

        foreach ($this->allowActions as $allow) {
            if (substr($allow, -1) == '*') {
                if (strpos($rule, rtrim($allow, '*')) === 0) {
                    return true;
                }
            } else {
                if ($rule == $allow) {
                    return true;
                }
            }
        }

        /* 权限检查 */
        if (Menu::checkRule($rule)) {
            return true;
        }

        $event->isValid = false; // 终止执行action
        $this->denyAccess();
    }

    /**
     * @throws ForbiddenHttpException
     */
    protected function denyAccess()
    {
        if (\Yii::$app->user->getIsGuest()) {
            \Yii::$app->user->loginRequired();
        } else {
            Yii::$app->session->setFlash('error', '您没有执行此操作的权限');
            Yii::$app->getResponse()->redirect(Yii::$app->request->referrer);
        }
    }
}
