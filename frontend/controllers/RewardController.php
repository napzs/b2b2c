<?php
/**
 *
 * hbshop
 *
 * @package   RewardController
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */
namespace frontend\controllers;

use frontend\widgets\reward\RewardForm;
use Yii;
use yii\filters\AccessControl;

class RewardController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $model = new RewardForm();
        if ($model->load(Yii::$app->request->post()) && $model->reward()) {
            Yii::$app->session->setFlash('success', '打赏成功');
            return $this->redirect(Yii::$app->request->referrer);
        } else {
            Yii::$app->session->setFlash('error', $model->hasErrors() ? current($model->getFirstErrors()) : '打赏失败');
            return $this->redirect(Yii::$app->request->referrer);
        }
    }

}
