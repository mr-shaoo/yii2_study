<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    //应用组件配置
    'components' => [

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'dwvn1gSVrJ0wLSyI1YZXhnflgEG0TvNu',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        //错误处理
        'errorHandler' => [
            'errorAction' => 'site/error',//自定义错误显示
            'maxSourceLines' => 20,//异常页面最多显示20条源代码。
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        //'defaultRoute' => 'Index',
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        //数据库配置
        'db' => require(__DIR__ . '/db.php'),
        //配置url 静态URL
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'suffix'=>'.html',
            'rules'=>[
            ],
        ],
    ],
    'controllerMap' => [
        [
            'account' => 'app\controllers\IndexController',
            'article' => [
                'class' => 'app\controllers\PostController',
                'enableCsrfValidation' => false,
            ],
        ],
    ],
    //设置默认控制器
    'defaultRoute' => 'index',
    //应用设置,全局参数 调用方法\Yii::$app->params['adminEmail']
    'params' => $params,

];
if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
