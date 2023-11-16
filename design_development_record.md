## 配置语言包

配置中文语言包，在common>>config>>main.php配置文件中添加
```php
/* 目标语言 */
'language' => 'zh-CN',
```

然后再在components数组中添加
```php
/**
 * 多语言管理，
 * 将“源语言”翻译成“目标语言”，必须使用\Yii::t('common','中文')，当源语言和目标语言相同时默认不翻译
 * common/messages中必须存在“目标语言(en-US)”文件夹，且对应语言文件中存在：'中文'=>'English'
 */
'i18n' => [
    'translations' => [
        '*' => [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath'=>'@common/messages',
            'fileMap' => [
                'common'=>'common.php',
                'backend'=>'backend.php',
                'frontend'=>'frontend.php',
            ],
        ],
    ],
],
```

语言包的调用
<?= Yii::t('backend','') ?>
<?= Yii::t('frontend','') ?>

## 配置数据库前缀
配置数据库前缀，在common>>config>>main_local.php文件中添加
```php
    'db' => [
        .....
        'tablePrefix' => 'wit_'
    ],
```
数据库表添加wit_前缀
