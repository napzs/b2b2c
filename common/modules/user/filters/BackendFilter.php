<?php
/**
 *
 * hbshop
 *
 * @package   BackendFilter
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace common\modules\user\filters;

use yii\web\NotFoundHttpException;
use yii\base\ActionFilter;

class BackendFilter extends ActionFilter
{
    /**
     * @var array
     */
    public $controllers = ['profile', 'recovery', 'registration', 'settings'];

    /**
     * @param \yii\base\Action $action
     *
     * @return bool
     * @throws \yii\web\NotFoundHttpException
     */
    public function beforeAction($action)
    {
        if (in_array($action->controller->id, $this->controllers)) {
            throw new NotFoundHttpException('Not found');
        }

        return true;
    }
}
