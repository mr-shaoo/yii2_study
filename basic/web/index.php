<?php
// comment out the following two lines when deployed to production
//− 定义是否在调试模式。如果设置为true，那么将看到更多的日志数据和细节错误的调用堆栈
defined('YII_DEBUG') or define('YII_DEBUG', true);
//可用值为 prod, dev 和 test. 它们在配置文件中用来定义：例如，一个不同的数据库连接(本地和远程)或其它值。
defined('YII_ENV') or define('YII_ENV', 'test');
defined('YII_ENV_DEV') or define('YII_ENV_DEV',true);
require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
//引入自定义函数库 2017年1月12日17:44:58
require(__DIR__.'./function.php');

$config = require(__DIR__ . '/../config/web.php');
(new yii\web\Application($config))->run();
