<?php

namespace api\controllers;

use Yii;
use yii\web\Controller;
use common\helpers\EncryptionHelper;
use yii\web\UnprocessableEntityHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'api\actions\ErrorAction',
            ],
        ];
    }

    /**
     * 生成请求连接
     * @return bool|string
     * @throws UnprocessableEntityHttpException
     */
    public function actionCreateUrlParams()
    {
        $params = array_merge(Yii::$app->getRequest()->get(), [
            'timestamp' => time()
        ]);

        //请求客户端id
        $appId = Yii::$app->getRequest()->get('app_id', null);

        if (empty($appId) || !array_key_exists($appId, Yii::$app->params['api']['api_user'])) {
            throw new UnprocessableEntityHttpException('请求appId不可为空');
        }

        $appSecret = isset(Yii::$app->params['api']['api_user'][$appId]) ? Yii::$app->params['api']['api_user'][$appId] : '';

        return EncryptionHelper::createUrlParams($params, $appSecret);
    }
}
