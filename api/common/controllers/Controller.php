<?php
/**
 *
 * hbshop
 *
 * @package   Controller
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace api\common\controllers;

use api\common\behaviors\ValidateBehavior;
use yii\filters\Cors;

class Controller extends \yii\rest\Controller {
    public function behaviors() {
        $behaviors = parent::behaviors();
        unset($behaviors['contentNegotiator']['formats']['application/xml']);
        $behaviors['cors'] = [
            'class' => Cors::className(),
            'cors'  => [
                'Origin'                           => ['*'],
                'Access-Control-Request-Method'    => [
                    'GET',
                    'POST',
                    'PUT',
                    'PATCH',
                    'DELETE',
                    'HEAD',
                    'OPTIONS'
                ],
                'Access-Control-Request-Headers'   => ['*'],
                'Access-Control-Allow-Credentials' => true,
                'Access-Control-Max-Age'           => 86400,
                'Access-Control-Expose-Headers'    => ['X-Pagination-Current-Page']
            ]
        ];
        $behaviors['validate'] = ValidateBehavior::className();

        return $behaviors;
    }
}