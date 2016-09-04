<?php
/**
 *
 * hbshop
 *
 * @package   console\SpiderFactory
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    alex<lxiangcn@gmail.com>
 */
namespace console\models;

use common\models\Spider;
use console\models\spider\SpiderAbstract;

class SpiderFactory
{
    public static function create($name)
    {
        $spider = Spider::find()->where(['name' => $name])->one();
        if (empty($spider)) {
            throw new \Exception('不存在目标网站');
        }
        $className = '\console\models\spider\\' . ucfirst(strtolower($name));
        if (!class_exists($className)) {
            $spiderObj = new SpiderAbstract(['spiderName' => $name]);
        }
        else {
            $spiderObj = new $className();
        }

        return $spiderObj;
    }
}
