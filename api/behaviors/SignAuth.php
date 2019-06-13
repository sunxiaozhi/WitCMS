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
use common\helpers\EncryptionHelper;
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
            Controller::EVENT_BEFORE_ACTION => 'checkSignAuth'
        ];
    }

    /**
     * @throws UnprocessableEntityHttpException
     */
    public function checkSignAuth($event)
    {
        //timestamp、sign、appId、secretKey

        //请求时间戳
        $timestamp = Yii::$app->getRequest()->get('timestamp', null);

        $timestampStrat = time() - Yii::$app->params['api']['time_difference'];
        $timestampEnd = time() + Yii::$app->params['api']['time_difference'];

        if (empty($timestamp) || !($timestampStrat <= $timestamp && $timestamp <= $timestampEnd)) {
            throw new UnprocessableEntityHttpException('请求时间错误');
        }

        //请求客户端
        $appId = Yii::$app->getRequest()->get('app_id', null);

        if (empty($appId) || !array_key_exists($appId, Yii::$app->params['api']['api_user'])) {
            throw new UnprocessableEntityHttpException('请求appId不可为空');
        }

        $appSecret = isset(Yii::$app->params['api']['api_user'][$appId]) ? Yii::$app->params['api']['api_user'][$appId] : '';

        $params = Yii::$app->getRequest()->get();

        return $this->verifySign($params, $appSecret);
    }

    /**
     * 校验sign
     * @param $params
     * @return bool
     * @throws UnprocessableEntityHttpException
     */
    protected function verifySign($params, $appSecret)
    {
        if (empty($params)) {
            throw new UnprocessableEntityHttpException('请求验签失败');
        }

        return EncryptionHelper::decodeUrlParam($params, $appSecret);
    }
}