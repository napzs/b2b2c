<?php
/**
 *
 * hbshop
 *
 * @package   Plugins
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace plugins\prettify;


use yii\base\BootstrapInterface;
use yii\web\View;
use yii\base\Event;

class Plugins extends \plugins\Plugins implements BootstrapInterface
{
    public $info = [
        'author' => '易大师',
        'version' => 'v1.0',
        'id' => 'prettify',
        'name' => '代码高亮',
        'description' => '代码高亮模块'
    ];

    public function bootstrap($app)
    {
        Event::on(View::className(), 'afterComment', [$this, 'run']);
        Event::on(View::className(), 'afterArticleView', [$this, 'run']);
    }

    public function run()
    {
        PrettifyAsset::register($this->view);
        $script = "$('pre').addClass('prettyprint linenums');prettyPrint();";
        $this->view->registerJs($script);
    }
}