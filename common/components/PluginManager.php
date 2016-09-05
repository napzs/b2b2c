<?php
/**
 *
 * hbshop
 *
 * @package   PluginManager
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace common\components;


use plugins\Plugins;

class PluginManager extends PackageManager
{
    public $paths = ['@plugins'];

    public $namespace = 'plugins\\';

    public $infoClass = 'Plugins';

    public function install(Plugins $plugin)
    {
        $plugin->install();
        return true;
    }

    public function uninstall(Plugins $plugin)
    {
        $plugin->uninstall();
        return true;
    }
    public function open(Plugins $plugin)
    {
        $model = $plugin->getModel();
        $model->status = 1;
        return $model->save();
    }
    public function close(Plugins $plugin)
    {
        $model = $plugin->getModel();
        $model->status = 0;
        return $model->save();
    }

}