<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            'class' => 'api\modules\v1\Module',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-api',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',  //接受json格式的数据
            ]
        ],
        //统一响应客户端的格式标准
        'response' => [
            'class' => 'yii\web\Response',
            'on beforeSend' => function ($event) {
                /* @var $response yii\web\Response */
                $response = $event->sender;
                $response->data = [
                    'code' => $response->getStatusCode(),
                    'message' => $response->statusText,
                    'data' => $response->data,
                ];
                $response->format = yii\web\Response::FORMAT_JSON;
            },
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-api', 'httpOnly' => true],

            'enableSession' => false, //设置yii\web\User::enableSession属性为false（因为RESTful APIs为无状态的，当yii\web\User::enableSession为false，请求中的用户认证状态就不能通过session来保持）
            'loginUrl' => null,  //设置yii\web\User::loginUrl属性为null（显示一个HTTP 403 错误而不是跳转到登录界面）
        ],
        'session' => [
            // this is the name of the session cookie used for login on the api
            'name' => 'advanced-api',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['v1/goods'],
                    //'pluralize' => true  //自动复数化控制器
                ],
            ]
        ],
    ],
    'params' => $params,
];
