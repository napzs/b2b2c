<?php
/**
 *
 * hbshop
 *
 * @package   SystemLog
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */
namespace backend\models;

use backend\models\query\SystemLogQuery;
use Yii;

/**
 * This is the model class for table "system_log".
 *
 * @property integer $id
 * @property integer $level
 * @property string  $category
 * @property integer $log_time
 * @property string  $prefix
 * @property integer $message
 */
class SystemLog extends \yii\db\ActiveRecord {
    const CATEGORY_NOTIFICATION = 'notification';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%system_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['level', 'log_time', 'message'], 'integer'], [['log_time'], 'required'], [['prefix'], 'string'],
            [['category'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id'       => Yii::t('app', 'ID'), 'level' => Yii::t('app', 'Level'),
            'category' => Yii::t('app', 'Category'), 'log_time' => Yii::t('app', 'Log Time'),
            'prefix'   => Yii::t('app', 'Prefix'), 'message' => Yii::t('app', 'Message'),
        ];
    }
}
