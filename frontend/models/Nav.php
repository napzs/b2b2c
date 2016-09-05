<?php
/**
 *
 * hbshop
 *
 * @package   Nav
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */
namespace frontend\models;

class Nav extends \common\models\Nav
{
    public function lists()
    {
        $list = \Yii::$app->cache->get('navList');
        if ($list === false) {
            $list = static::find()->all();
            \Yii::$app->cache->set('navList', $list, 60 * 60 * 24);
        }

        return $list;
    }
}
