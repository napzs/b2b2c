<?php
/**
 *
 * hbshop
 *
 * @package   StatusEnum
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */
namespace common\enums;

class StatusEnum
{
    const STATUS_OFF = 0;
    const STATUS_ON = 1;


    public static $list = [
        self::STATUS_ON => '开启',
        self::STATUS_OFF => '关闭',
    ];
}