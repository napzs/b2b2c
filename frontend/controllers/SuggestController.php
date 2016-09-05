<?php
/**
 *
 * hbshop
 *
 * @package   SuggestController
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */
namespace frontend\controllers;

use common\models\Comment;
use common\models\Suggest;
use yii\base\DynamicModel;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;

class SuggestController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
