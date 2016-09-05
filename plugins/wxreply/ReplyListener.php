<?php
/**
 *
 * hbshop
 *
 * @package   ReplyListener
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace plugins\wxreply;

use Yii;

class ReplyListener
{
    public static function handle($event)
    {
        $params = Yii::$app->request->getBodyParams();
        $msgType = $params['MsgType'];
        $word = '你说了:';
        if ($msgType == 'text') {
            $word .= trim($params['Content']);
        }
        $result = $event->sender->renderText($word);
        $event->result = $result;
    }
}