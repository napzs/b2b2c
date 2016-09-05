<?php
/**
 *
 * hbshop
 *
 * @package   HighLightAsset
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace frontend\widgets\highlight;


use yii\web\AssetBundle;

class HighLightAsset extends AssetBundle
{
    public $sourcePath = '@frontend/widgets/highlight/assets';
    public $css = [
        'highlight.css',
    ];
    public $js = [
        'highlight.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}