<?php
return [
    'name' => 'WitCMS',
    'version' => '1.0.0',

    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',

    /* 源语言 */
    //'sourceLanguage' => 'zh-CN',
    /* 目标语言 */
    'language' => 'zh-CN',

    'modules' => [
        //markdown 编辑器
        'markdown' => [
            'class' => 'kartik\markdown\Module',
        ]
    ],

    'components' => [
        //配置读写分离
        /*'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=192.168.0.65;dbname=witcms',
            'username' => 'root',
            'password' => '123456',
            'charset' => 'utf8',
            'tablePrefix' => 'wit_',

            'slaveConfig' => [
                'username' => 'root',
                'password' => '123456',
                'attributes' => [
                    // use a smaller connection timeout
                    PDO::ATTR_TIMEOUT => 10,
                ],
            ],

            'slaves' => [
                ['dsn' => 'mysql:host=192.168.0.66;dbname=witcms'],
            ]
        ],*/

        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@common/runtime/cache',
        ],

        /**
         * 多语言管理，
         * 将“源语言”翻译成“目标语言”，必须使用\Yii::t('common','中文')，当源语言和目标语言相同时默认不翻译
         * common/messages中必须存在“目标语言(en-US)”文件夹，且对应语言文件中存在：'中文'=>'English'
         */
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'common' => 'common.php',
                        'backend' => 'backend.php',
                        'frontend' => 'frontend.php',
                        'database' => 'database.php',
                    ],
                ],
            ],
        ],
        'formatter' => [
            'dateFormat' => 'php:Y-m-d',
            'datetimeFormat' => 'php:Y-m-d H:i:s',
            'timeFormat' => 'php:H:i:s',
        ],
        'siteInfo' => [
            'class' => 'common\components\SiteInfo'
        ],
        'siteConfig' => [
            'class' => 'common\components\SiteConfig'
        ],
    ],
    'on beforeRequest' => [common\components\SiteConfig::className(), 'getSiteConfigs']
    //'timeZone' => 'Asia/Shanghai',
];
