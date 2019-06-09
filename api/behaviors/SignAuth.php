<?php
/**
 * api请求签名验证
 * User: sunxiaozhi
 * Date: 2019/6/7 9:35
 */

namespace api\behaviors;

use Yii;
use yii\base\Behavior;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UnprocessableEntityHttpException;

class SignAuth extends Behavior
{
    /**
     * @return array
     * @throws UnprocessableEntityHttpException
     */
    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => $this->checkSignAuth()
        ];
    }

    /**
     * @throws UnprocessableEntityHttpException
     */
    public function checkSignAuth()
    {
        //timestamp、sign、appId、secretKey
        $timestamp = Yii::$app->request->get('timestamp', null);

        if (empty($timestamp) || (time() - $timestamp) > Yii::$app->params['api']['time_difference']) {
            throw new UnprocessableEntityHttpException('请求时间错误');
        }

        $appId = Yii::$app->request->get('app_id', null);

        if (empty($appId) || !array_key_exists($appId, Yii::$app->params['api']['api_user'])) {
            throw new UnprocessableEntityHttpException('请求appId不可为空');
        }

        return true;
    }
}