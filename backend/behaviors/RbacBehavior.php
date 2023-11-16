<?php

namespace backend\behaviors;

use Yii;
use common\helpers\Url;
use yii\base\Controller;
use common\models\Menu;
use yii\web\ForbiddenHttpException;

/**
 * 使用方法：
 * 'as rbac' => [
 *     'class' => 'backend\behaviors\RbacBehavior',
 *     'allowActions' => ['site/login', 'site/error']
 *     'allowUsers' => [1]
 * ]
 */
class RbacBehavior extends \yii\base\Behavior
{
    /**
     * @var array 无需权限检查的action
     */
    public $allowActions = [];

    /**
     * @var array  无需权限检查的id
     */
    public $allowUsers = [];

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
        /* 超级管理员允许访问任何页面 */
        if(in_array(Yii::$app->user->id, $this->allowUsers)){
            return $event->isValid;
        }

        $action = $event->action;
        $rule = $action->getUniqueId();

        foreach ($this->allowActions as $allow) {
            if (substr($allow, -1) == '*') {
                if (strpos($rule, rtrim($allow, '*')) === 0) {
                    return $event->isValid;
                }
            } else {
                if ($rule == $allow) {
                    return $event->isValid;
                }
            }
        }

        /* 权限检查 */
        if (Menu::checkRule($rule)) {
            return $event->isValid;
        }

        $event->isValid = false; // 终止执行action
        $this->denyAccess();

        return $event->isValid;
    }

    /**
     * @throws ForbiddenHttpException
     */
    protected function denyAccess()
    {
        if (\Yii::$app->user->getIsGuest()) {
            \Yii::$app->user->loginRequired();
        } else {
            throw new ForbiddenHttpException('您没有执行此操作的权限');
        }
    }
}
