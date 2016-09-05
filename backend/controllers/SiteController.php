<?php
/**
 *
 * hbshop
 *
 * @package   SiteController
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * Site controller.
 */
class SiteController extends Controller {
    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
            'error'     => [
                'class' => 'yii\web\ErrorAction',
            ],
            'demo'      => [
                'class' => 'yii\web\ViewAction',
            ],
            'webupload' => [
                'class' => \yidashi\webuploader\Action::className()
            ],
        ];
    }

    public function actionIndex() {
        return $this->render('index');
    }

}
