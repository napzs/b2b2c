<?php
/**
 *
 * hbshop
 *
 * @package   SearchModelTrait
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */
namespace backend\models\search;

use Yii;

trait SearchModelTrait {

    public function search($filters) {
        /**
         * @var $query \yii\db\ActiveQuery
         */
        $query = static::find();
        /**
         * 查询过滤
         */
        $params = Yii::$app->getRequest()->getQueryParams();

        if (count($filters) == 0 || !isset($params[$this->formName()])) {
            return $query;
        }
        $this->load($params);

        foreach ($filters as $filter) {
            if (strncmp($filter, "%", 1) == 0) {
                $filter = substr($filter, 1);
                $query->andFilterWhere([
                    'like',
                    $filter,
                    $this->{$filter}
                ]);
            }
            else {
                $query->andFilterWhere([
                    $filter => $this->{$filter}
                ]);
            }
        }


        return $query;
    }
}

?>