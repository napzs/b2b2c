<?php
/**
 *
 * hbshop
 *
 * @package   console\AppController
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    alex<lxiangcn@gmail.com>
 */

namespace console\controllers;


use yii\console\Controller;
use Yii;
use yii\helpers\Console;

class AppController extends Controller
{
    public $defaultAction = 'install';

    public $writablePaths
        = [
            '@root/runtime',
            '@root/web/assets',
            '@root/web/admin/assets',
            '@root/web/storage'
        ];

    public $executablePaths
        = [
            '@root/yii',
        ];

    public $envPath = '@root/.env';

    public $installFile = '@root/web/storage/install.lock';

    public function actionSetWritable()
    {
        $this->setWritable($this->writablePaths);
    }

    public function actionSetExecutable()
    {
        $this->setExecutable($this->executablePaths);
    }

    public function actionSetKeys()
    {
        $this->setKeys($this->envPath);
    }

    public function setWritable($paths)
    {
        foreach ($paths as $writable) {
            $writable = Yii::getAlias($writable);
            Console::output("Setting writable: {$writable}");
            @chmod($writable, 0777);
        }
    }

    public function setExecutable($paths)
    {
        foreach ($paths as $executable) {
            $executable = Yii::getAlias($executable);
            Console::output("Setting executable: {$executable}");
            @chmod($executable, 0755);
        }
    }

    public function setKeys($file)
    {
        $file = Yii::getAlias($file);
        Console::output("Generating keys in {$file}");
        $content = file_get_contents($file);
        $content = preg_replace_callback('/<generated_key>/', function () {
            $length = 32;
            $bytes  = openssl_random_pseudo_bytes(32, $cryptoStrong);

            return strtr(substr(base64_encode($bytes), 0, $length), '+/', '_-');
        }, $content);
        file_put_contents($file, $content);
    }

    public function actionSetDb()
    {
        do {
            $dbHost     = $this->prompt('dbhost(默认为中括号内的值)' . PHP_EOL, ['default' => 'localhost']);
            $dbPort     = $this->prompt('dbport(默认为中括号内的值)' . PHP_EOL, ['default' => '3306']);
            $dbDbname   = $this->prompt('dbname(不存在则自动创建)' . PHP_EOL, ['default' => 'hbshop']);
            $dbUsername = $this->prompt('dbusername(默认为中括号内的值)' . PHP_EOL, ['default' => 'root']);
            $dbPassword = $this->prompt('dbpassword' . PHP_EOL);
            $dbDsn      = "mysql:host={$dbHost};port={$dbPort}";
        }
        while (!$this->testConnect($dbDsn, $dbDbname, $dbUsername, $dbPassword));
        $dbDsn         = "mysql:host={$dbHost};port={$dbPort};dbname={$dbDbname}";
        $dbTablePrefix = $this->prompt('tableprefix(默认为中括号内的值)' . PHP_EOL, ['default' => 'hbs_']);
        $this->setEnv('DB_USERNAME', $dbUsername);
        $this->setEnv('DB_PASSWORD', $dbPassword);
        $this->setEnv('DB_TABLE_PREFIX', $dbTablePrefix);
        $this->setEnv('DB_DSN', $dbDsn);
        Yii::$app->set('db', Yii::createObject([
            'class'       => 'yii\db\Connection',
            'dsn'         => $dbDsn,
            'username'    => $dbUsername,
            'password'    => $dbPassword,
            'tablePrefix' => $dbTablePrefix,
            'charset'     => 'utf8'
        ]));
    }

    public function testConnect($dsn = '', $dbname, $username = '', $password = '')
    {
        try {
            $pdo = new \PDO($dsn, $username, $password);
            $sql = "CREATE DATABASE IF NOT EXISTS {$dbname} DEFAULT CHARSET utf8 COLLATE utf8_general_ci;";
            $pdo->query($sql);
        }
        catch (\Exception $e) {
            $this->stderr("\n" . $e->getMessage(), Console::FG_RED);
            $this->stderr("\n连接失败，核对数据库信息。\n", Console::FG_RED, Console::BOLD);

            return false;
        }

        return true;
    }

    public function setEnv($name, $value)
    {
        $file    = Yii::getAlias($this->envPath);
        $content = preg_replace("/({$name}\s*=)\s*(.*)/", "\\1$value", file_get_contents($file));
        file_put_contents($file, $content);
    }

    public function checkInstalled()
    {
        return file_exists(Yii::getAlias($this->installFile));
    }

    public function actionInstall()
    {
        if ($this->checkInstalled()) {
            $this->stdout("系统已经初始化过，如过坚持重新安装，请删除indesll.lock文件后再执行。\n*注意，重新安装将会导致数据丢失。\n", Console::FG_RED);
            die;
        }
        $start = "欢迎使用 hbSHop 安装程序，请按照屏幕上的提示操作以完成安装。\n";
        $this->stdout($start, Console::FG_GREEN);
        copy(Yii::getAlias('@root/.env.example'), Yii::getAlias($this->envPath));
        $this->runAction('set-writable', ['interactive' => $this->interactive]);
        $this->runAction('set-executable', ['interactive' => $this->interactive]);
        $this->runAction('set-keys', ['interactive' => $this->interactive]);
        $this->runAction('set-db', ['interactive' => $this->interactive]);
        $appStatus = $this->select('设置当前应用模式', ['development' => 'dev', 'production' => 'prod']);
        $this->setEnv('YII_DEBUG', $appStatus == 'prod' ? 'false' : 'true');
        $this->setEnv('YII_ENV', $appStatus);
        Yii::$app->runAction('migrate/up', ['interactive' => false]);
        Yii::$app->runAction('cache/flush-all', ['interactive' => false]);
        file_put_contents(Yii::getAlias($this->installFile), time());
        $end = "安装成功，感谢选择和使用 hbSHop 。\n说明和注意事项：一些基本的设置可以在.env文件里修改。\n";
        $this->stdout($end, Console::FG_GREEN);
    }

    public function actionReset()
    {
        @unlink(Yii::getAlias('@root/web/storage/install.lock'));
    }

    public function actionUpdate()
    {
        \Yii::$app->runAction('migrate/up', ['interactive' => $this->interactive]);
    }


}


