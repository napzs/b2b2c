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
namespace frontend\components;


use common\models\Article;
use yii\base\Component;
use common\models\Search as SearchModel;
use yii\data\ActiveDataProvider;

class Search extends Component
{
    public $engine = 'local';


    public function search($q)
    {
        return call_user_func([$this, $this->engine], $q);
    }
    public function xunsearch($q)
    {
        $search = new SearchModel();
        return $search->search($q);
    }

    public function local($q)
    {
        return new ActiveDataProvider([
            'query' => Article::find()->published()->andWhere(['like', 'title', $q])
        ]);
    }
}