<?php
/**
 *
 * hbshop
 *
 * @package   Queue
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace common\components;


use yii\base\Object;

class Queue extends Object
{
    /**
     * @param string $queue 队列分类名
     * @param string $className 处理队列的类名
     * @param array $args 参数关联数组
     */
    public function push($queue, $className, $args)
    {
        \Resque::enqueue($queue, $className, $args);
    }

    public function pop()
    {

    }
}