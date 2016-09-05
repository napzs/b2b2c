<?php
/**
 *
 * hbshop
 *
 * @package   Search
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace common\models;


use hightman\xunsearch\ActiveRecord;
use yii\data\ActiveDataProvider;

class Search extends ActiveRecord
{
    public function getArticle()
    {
        return Article::findOne($this->id);
    }
    public function getTrueView()
    {
        return $this->getArticle() ? $this->getArticle()->getTrueView() : 0;
    }
    public function getComment()
    {
        return $this->getArticle() ? $this->getArticle()->comment : 0;
    }
    public function search($q)
    {
        $query = self::find()->where($q)->andWhere(['status' => 1]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'published_at' => SORT_DESC,
                ]
            ]
        ]);

        return $dataProvider;
    }
}