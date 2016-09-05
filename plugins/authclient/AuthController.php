<?php
/**
 *
 * hbshop
 *
 * @package   AuthController
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace plugins\authclient;


use yii\web\Controller;
use common\models\Auth;
use common\models\User;
use Yii;

class AuthController extends Controller
{
    public function actions()
    {

        return [
            'index' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'onAuthSuccess'],
            ],
        ];
    }

    public function onAuthSuccess($client)
    {
        (new AuthHandler($client))->handle();
    }

}