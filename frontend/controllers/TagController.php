<?php
/**
 *
 * hbshop
 *
 * @package   TagController
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace frontend\controllers;


use frontend\models\Tag;
use yii\web\Controller;

class TagController extends Controller
{
    public function actions()
    {
        return [
            'search' => 'common\\actions\\TagSearchAction'
        ];
    }

    public function actionIndex()
    {
        $hotModels = Tag::hot();
        $models = Tag::find()->all();
        return $this->render('index', [
            'models' => $models,
            'hotModels' => $hotModels
        ]);
    }
}