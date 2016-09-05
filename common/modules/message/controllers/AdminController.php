<?php
/**
 *
 * hbshop
 *
 * @package   AdminController
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace common\modules\message\controllers;


use common\modules\message\models\MessageData;
use yii\web\Controller;

class AdminController extends Controller
{
    public function actionIndex()
    {

    }

    public function actionCreate()
    {
        $model = new MessageData();
        $model->group = 'all';
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('success', '发送成功');
            return $this->redirect(['create']);
        }
        return $this->render('create', [
           'model' => $model
        ]);
    }
}