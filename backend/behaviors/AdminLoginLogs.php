<?php
/**
 * 后台用户登录记录
 * User: Sunxiaozhi
 * Date: 2019/4/25 9:23
 */

namespace backend\behaviors;

use Yii;
use yii\web\User;
use yii\base\Behavior;

class AdminLoginLogs extends Behavior
{
    public function events()
    {
        return [
            User::EVENT_AFTER_LOGIN => 'addAdminLoginLogs'
        ];
    }

    /**
     * 登录日志
     * @param $event
     * @return bool
     */
    public function addAdminLoginLogs($event)
    {
        /* @var $model \common\models\Admin */

        $model = $event->identity;
        $model->login_ip = Yii::$app->request->getUserIP();
        $model->login_num += 1;
        $model->last_time = time();

        return $model->save();
    }
}