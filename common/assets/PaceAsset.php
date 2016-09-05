<?php
/**
 *
 * hbshop
 *
 * @package   PaceAsset
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace common\assets;


use yii\web\AssetBundle;

class PaceAsset extends AssetBundle
{
    public $sourcePath = '@bower/pace';

    public $js = [
        'pace.js'
    ];

    public $css = [
        'themes/white/pace-theme-minimal.css'
    ];
}