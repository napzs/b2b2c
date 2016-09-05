<?php
/**
 *
 * hbshop
 *
 * @package   HtmlSortableAsset
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */
namespace backend\assets;


class HtmlSortableAsset extends \yii\web\AssetBundle {
    public $sourcePath = '@backend/static';
    public $js         = [
        'js/html.sortable.js'
    ];
    public $depends    = [
        'yii\web\JqueryAsset'
    ];
}