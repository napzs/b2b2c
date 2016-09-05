<?php
/**
 *
 * hbshop
 *
 * @package   PageController
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */
namespace frontend\controllers;

use common\models\Page;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PageController extends Controller
{
    public function actionSlug($slug)
    {
        $page = Page::find()->where(['slug' => $slug])->one();
        if (empty($page)) {
            throw new NotFoundHttpException('页面不存在');
        }
        $this->layout = $page->use_layout ? 'main' : false;

        return $this->render('index', [
            'page' => $page,
        ]);
    }
}
