<?php
/**
 *
 * hbshop
 *
 * @package   Plugins
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace plugins\wxreply;


use yii\base\Event;

class Plugins extends \plugins\Plugins
{
    public $info = [
        'author' => '易大师',
        'version' => 'v1.0',
        'id' => 'wxreply',
        'name' => '微信自动回复',
        'description' => '微信自动回复'
    ];

    public function wechat($app)
    {
        Event::on('yii\web\Controller','afterAction', ['plugins\wxreply\ReplyListener', 'handle']);
    }

}