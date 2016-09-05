<?php
/**
 *
 * hbshop
 *
 * @package   Tag
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace frontend\models;


class Tag extends \common\models\Tag
{
    public static function hot()
    {
        return self::find()->orderBy('article desc')->limit(20)->all();
    }
}