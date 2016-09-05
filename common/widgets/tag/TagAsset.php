<?php
/**
 *
 * hbshop
 *
 * @package   TagAsset
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */
namespace common\widgets\tag;

use yii\web\AssetBundle;

class TagAsset extends AssetBundle
{
    public $sourcePath = '@common/widgets/tag/assets';
    public $css = [
        'jquery.tagsinput.min.css',
    ];
    public $js = [
        'jquery.tagsinput.min.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
