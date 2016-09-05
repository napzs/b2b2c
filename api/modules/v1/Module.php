<?php
/**
 *
 * hbshop
 *
 * @package   Module
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace api\modules\v1;


class Module extends \yii\base\Module {
    public $controllerNamespace = 'api\modules\v1\controllers';
    public $defaultRoute        = 'site';
}