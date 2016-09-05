<?php
/**
 *
 * hbshop
 *
 * @package   TextWidget
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace frontend\widgets\area;

use yii\base\Widget;

class TextWidget extends Widget
{
    public $model;


    public function run() {
        return $this->model->template;
    }
}