<?php
/**
 *
 * hbshop
 *
 * @package   ArticleModule
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */
namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%article_module}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $model
 */
class ArticleModule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_module}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'title'], 'string', 'max' => 50],
            [['model'], 'string', 'max' => 128],
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
            'title' => 'Title',
            'model' => 'Model',
        ];
    }
}
