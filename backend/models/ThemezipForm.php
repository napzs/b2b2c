<?php
/**
 *
 * hbshop
 *
 * @package   ThemezipForm
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace backend\models;


use yii\base\Model;

class ThemezipForm extends Model {
    public $themezip;


    public function rules() {
        return [
            ["themezip", "file", "extensions" => "zip"]
        ];
    }
}