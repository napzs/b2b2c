<?php
/**
 *
 * hbshop
 *
 * @package   LoadPlugins
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace common\components;

use common\models\Module;
use Yii;
use yii\base\BootstrapInterface;
use yii\base\Component;
use yii\caching\DbDependency;
use plugins\Plugins;

class LoadPlugins extends Component implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $models = Yii::$app->cache->get('plugins');
        if ($models === false) {
            $models = Module::findOpenModules(Module::TYPE_PLUGIN);
            Yii::$app->cache->set('plugins', $models, 0, new DbDependency(['sql' => 'SELECT MAX(`updated_at`) FROM {{%module}}']));
        }

        foreach ($models as $model) {
            /* @var $plugins Plugins*/
            $plugins = Yii::$app->pluginManager->findOne($model->id);

            if ($plugins instanceof BootstrapInterface) {
                $plugins->bootstrap($app);
            }
            // 设置别名
            if (!empty($plugins->aliases)) {
                foreach ($plugins->aliases as $name => $path) {
                    Yii::setAlias($name, $path);
                }
            }
            // 加载模块
            $moduleClass = $plugins->getNamespace() . '\Module';
            if (class_exists($moduleClass) && $plugins->app == $app->id) {

                $app->setModule($model->id, $moduleClass);
            }
        }
    }
}