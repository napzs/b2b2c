<?php
/**
 *
 * hbshop
 *
 * @package   ArticleModuleContract
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace common\models;

use yii\db\ActiveRecord;

abstract class ArticleModuleContract extends ActiveRecord
{
    abstract public function attributeTypes();

    public function getAttributeType($attribute)
    {
        $types = $this->attributeTypes();
        return isset($types[$attribute]) ? $types[$attribute] : 'text';
    }

    public function formAttributes()
    {
        $attributes = $this->attributes();
        unset($attributes[array_search($this->primaryKey()[0], $attributes)]);
        return $attributes;
    }
}