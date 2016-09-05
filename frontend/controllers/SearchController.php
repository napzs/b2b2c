<?php
/**
 *
 * hbshop
 *
 * @package   SearchController
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace frontend\controllers;


use common\models\Article;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class SearchController extends Controller
{

    public function actionIndex()
    {
        $q = \Yii::$app->request->get('q');
        if (empty($q)){
            return $this->goHome();
        }
        $dataProvider = \Yii::$app->search->search($q);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'q' => $q
        ]);
    }
}