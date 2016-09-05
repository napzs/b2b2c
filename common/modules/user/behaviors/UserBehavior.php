<?php
/**
 *
 * hbshop
 *
 * @package   UserBehavior
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace common\modules\user\behaviors;


use common\modules\user\models\User;
use common\modules\user\models\Profile;
use yii\base\Behavior;

/**
 * 方便替换
 * Class UserBehavior
 * @package   UserBehavior
 */
class UserBehavior extends Behavior
{
    public $userIdAttribute = 'user_id';
    public function getUser()
    {
        return $this->owner->hasOne(User::className(), ['id' => $this->userIdAttribute]);
    }

    public function getFrom()
    {
        return $this->owner->hasOne(User::className(), ['id' => 'from_uid']);
    }

    public function getTo()
    {
        return $this->owner->hasOne(User::className(), ['id' => 'to_uid']);
    }

    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => $this->userIdAttribute]);
    }
}