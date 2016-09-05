<?php
/**
 *
 * hbshop
 *
 * @package   FileManagerController
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */
namespace backend\controllers;

class FileManagerController extends \yii\web\Controller {
    public function actionIndex() {
        return $this->render('index');
    }
}
