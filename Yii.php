<?php
if (is_file(__DIR__ . '/.env')) {
    (new \Dotenv\Dotenv(__DIR__))->load();
}

defined('YII_DEBUG') or define('YII_DEBUG', env('YII_DEBUG'));
defined('YII_ENV') or define('YII_ENV', env('YII_ENV', 'prod'));

class Yii extends \yii\BaseYii
{
    public static function getVersion()
    {
        return '1.0.0';
    }

    public static function powered()
    {
        return 'Powered By ' . 'B2b2c';
    }
}

spl_autoload_register(['Yii', 'autoload'], true, true);
Yii::$classMap  = require(__DIR__ . '/vendor/yiisoft/yii2/classes.php');
Yii::$container = new yii\di\Container();