<?php
/**
 *
 * hbshop
 *
 * @package   NotifyCategory
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */
namespace common\models;

use Yii;

/**
 * This is the model class for table "pop_notify_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $text
 */
class NotifyCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%notify_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 50],
            [['text'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'text' => 'Text',
        ];
    }
}
