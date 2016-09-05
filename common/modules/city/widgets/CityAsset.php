<?php
/**
 *
 * hbshop
 *
 * @package   CityAsset
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace common\modules\city\widgets;


use yii\web\AssetBundle;

class CityAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/city/widgets/assets';

    public $js = [
        'city.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}