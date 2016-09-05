<?php
/**
 *
 * hbshop
 *
 * @package   LinkForm
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */
namespace backend\models;

use yii\base\Model;


class LinkForm extends Model {
    public $url = "";

    public $name = "";

    public function rules() {
        return [
            [['url', 'name'], 'required'], [['url', 'name'], 'string'],

        ];
    }


    public function attributeLabels() {
        return [];
    }


}
