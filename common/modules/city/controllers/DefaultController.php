<?php
/**
 *
 * hbshop
 *
 * @package   DefaultController
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace common\modules\city\controllers;


use common\models\City;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionChildren($id)
    {
        \Yii::$app->response->format = 'json';
        if (!is_numeric($id)) {
            $id = null;
        }
        return City::getChildren($id);
    }
}