<?php
/**
 *
 * hbshop
 *
 * @package   PrettifyAsset
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace plugins\prettify;


use yii\web\AssetBundle;

class PrettifyAsset extends AssetBundle
{
    public $sourcePath = '@plugins/prettify/assets';
    public $css = [
        'prettify.css',
    ];
    public $js = [
        'prettify.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}