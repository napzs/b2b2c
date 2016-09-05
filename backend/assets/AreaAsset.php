<?php
/**
 *
 * hbshop
 *
 * @package   AreaAsset
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace backend\assets;

class AreaAsset extends \yii\web\AssetBundle {
    public $sourcePath = '@backend/static';
    public $css        = [
        'css/area.css',
    ];
    public $js         = [
        'js/area.js'
    ];
    public $depends    = [
        'backend\assets\AppAsset',
        'backend\assets\HtmlSortableAsset'
    ];
    public $jsOptions  = array(
        'position' => \yii\web\View::POS_END
    );
}
