<?php
/**
 *
 * hbshop
 *
 * @package   NavController
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace api\modules\v1\controllers;


use api\common\controllers\Controller;
use common\models\Category;

class NavController extends Controller {
    public function actionIndex() {
        $cates = Category::find()->where(['is_nav' => 1])->all();

        return $cates;
    }
}