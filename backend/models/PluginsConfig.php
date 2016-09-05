<?php
/**
 *
 * hbshop
 *
 * @package   PluginsConfig
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace backend\models;


use yii\base\Model;

class PluginsConfig extends Model {
    public $name;
    public $value;
    public $extra;
    public $desc;
    public $type;

    public function rules() {
        return [
            [['name', 'extra', 'desc', 'type'], 'safe', 'on' => 'init'], ['value', 'safe']
        ];
    }

    public function attributeLabels() {
        return [
            'name' => '配置名', 'value' => '配置值', 'desc' => '配置描述', 'extra' => '配置扩展'
        ];
    }
}