<?php
/**
 *
 * hbshop
 *
 * @package   RuleHelper
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace backend\modules\rbac\components;

use Yii;

class RuleHelper
{
    public static function enums()
    {
        $ruleModels = Yii::$app->authManager->getRules();
        $rules = array_keys($ruleModels);
        return array_combine($rules, $rules);
    }
}