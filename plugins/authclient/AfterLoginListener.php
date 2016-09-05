<?php
/**
 *
 * hbshop
 *
 * @package   AfterLoginListener
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace plugins\authclient;
use Yii;


class AfterLoginListener
{
    public static function handle($event)
    {
        if (Yii::$app->has('authClientCollection')) {
            list(, $url) = Yii::$app->assetManager->publish('@plugins/authclient/assets');
            Yii::$app->view->registerCss(<<<CSS
.auth-icon.QQ {
    background: url({$url}/qq.png) no-repeat;
    background-size: 32px 32px;
}
.auth-icon.weibo {
    background: url({$url}/weibo.png) no-repeat;
    background-size: 32px 32px;
}
.auth-icon.weixin {
    background: url({$url}/weixin.png) no-repeat;
    background-size: 32px 32px;
}
CSS
            );
            echo \yii\authclient\widgets\AuthChoice::widget([
                'id' => 'auth-login',
                'baseAuthUrl' => ['/auth'],
                'popupMode' => true,
            ]);
        }
    }
}