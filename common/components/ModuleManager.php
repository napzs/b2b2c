<?php
/**
 *
 * hbshop
 *
 * @package   ModuleManager
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace common\components;


use plugins\Plugins;

class ModuleManager extends PackageManager
{
    public $paths = [
        '@common/modules'
    ];

    public $namespace = 'common\\modules\\';

    public $infoClass = 'Module';

}