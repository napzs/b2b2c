<?php
/**
 *
 * hbshop
 *
 * @package   BooleanEnum
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace common\enums;

class BooleanEnum
{
    const TRUE = 1;
    const FLASE = 0;

    public static $list = [
        self::TRUE => '是',
        self::FLASE => '否'
    ];
}