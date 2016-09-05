<?php
/**
 *
 * hbshop
 *
 * @package   HighLightWidget
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace frontend\widgets\highlight;


use yii\base\Widget;

class HighLightWidget extends Widget
{
    public function run()
    {
        HighLightAsset::register($this->view);
        $script = "hljs.initHighlightingOnLoad();";
        $this->view->registerJs($script);
    }
}