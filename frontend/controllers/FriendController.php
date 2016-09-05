<?php
/**
 *
 * hbshop
 *
 * @package   FriendController
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace frontend\controllers;


use common\models\Friend;
use yii\filters\AccessControl;
use yii\web\Controller;

class FriendController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    public function actionFollow($id)
    {
        \Yii::$app->response->format = 'json';
        $model = new Friend();
        if ($model->isFollow($id)) {
            $model->cancelFollow($id);
            return [
                'message' => '已取消'
            ];
        } else {
            $model->follow($id);
            return [
                'message' => '已关注'
            ];
        }
    }
}