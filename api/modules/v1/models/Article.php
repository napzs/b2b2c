<?php
/**
 *
 * hbshop
 *
 * @package   Article
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace api\modules\v1\models;


class Article extends \common\models\Article {

    public function extraFields() {
        return ['data'];
    }
}