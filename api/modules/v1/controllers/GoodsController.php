<?php

namespace api\modules\v1\controllers;

use api\models\Goods;
use yii\rest\ActiveController;
use yii\web\Response;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\RateLimiter;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;

class GoodsController extends ActiveController
{
    public $modelClass = 'api\models\Goods';

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function behaviors()
    {
        /*$behaviors = parent::behaviors();

        //速率限制
        $behaviors['rateLimiter'] = [
            'class' => RateLimiter::className(),
            'enableRateLimitHeaders' => true,
        ];

        //授权认证
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'authMethods' => [
                //下面是三种验证access_token方式
                //1.HTTP 基本认证: access token 当作用户名发送，应用在access token可安全存在API使用端的场景，例如，API使用端是运行在一台服务器上的程序。
                //HttpBasicAuth::className(),
                //2.OAuth 2: 使用者从认证服务器上获取基于OAuth2协议的access token，然后通过 HTTP Bearer Tokens 发送到API 服务器。
                //HttpBearerAuth::className(),
                //3.请求参数: access token 当作API URL请求参数发送，这种方式应主要用于JSONP请求，因为它不能使用HTTP头来发送access token
                //http://localhost/user/index/index?access-token=123
                QueryParamAuth::className(),
            ],
        ];

        //格式化应答数据
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;

        return $behaviors;*/

        return ArrayHelper::merge(parent::behaviors(), [
            //速率限制
            'rateLimiter' => [
                'enableRateLimitHeaders' => true,
            ],

            //授权认证
            'authenticator' => [
                'authMethods' => [
                    //下面是三种验证access_token方式
                    //1.HTTP 基本认证: access token 当作用户名发送，应用在access token可安全存在API使用端的场景，例如，API使用端是运行在一台服务器上的程序。
                    //HttpBasicAuth::className(),
                    //2.OAuth 2: 使用者从认证服务器上获取基于OAuth2协议的access token，然后通过 HTTP Bearer Tokens 发送到API 服务器。
                    //HttpBearerAuth::className(),
                    //3.请求参数: access token 当作API URL请求参数发送，这种方式应主要用于JSONP请求，因为它不能使用HTTP头来发送access token
                    //http://localhost/user/index/index?access-token=123
                    QueryParamAuth::className(),
                ]
            ],

            //格式化应答数据
            'contentNegotiator' => [
                'formats' => [
                    'text/html' => Response::FORMAT_JSON
                ]
            ]
        ]);
    }

    public function actions()
    {
        $actions = parent::actions();

        unset($actions['index']);

        return $actions;
    }

    //重写 $actions['index']
    public function actionIndex()
    {
        return new ActiveDataProvider([
            'query' => Goods::find(),
            // 设置分页，比如每页5个条目
            'pagination' => new Pagination(['pageSize' => 5])
        ]);
    }
}
