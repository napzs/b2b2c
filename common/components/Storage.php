<?php
/**
 *
 * hbshop
 *
 * @package   Storage
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace common\components;


use yii\base\Component;

class Storage extends Component
{
    public $baseUrl;

    public $basePath;

    public function init()
    {
        parent::init();
        $this->baseUrl = \Yii::getAlias($this->baseUrl);
        $this->basePath = \Yii::getAlias($this->basePath);
    }

    public function path2url($path)
    {
        return $this->baseUrl . DIRECTORY_SEPARATOR . pathinfo($path, PATHINFO_BASENAME);
    }
    public function url2path($url)
    {
        return $this->basePath . DIRECTORY_SEPARATOR . pathinfo($url, PATHINFO_BASENAME);
    }
}