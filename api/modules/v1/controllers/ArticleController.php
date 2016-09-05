<?php
/**
 *
 * hbshop
 *
 * @package   ArticleController
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace api\modules\v1\controllers;


use api\common\controllers\Controller;
use api\modules\v1\models\Article;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use common\events\ArticleEvent;
use yii\web\NotFoundHttpException;

class ArticleController extends Controller
{
    public function actionIndex($cid = '')
    {
        $query        = Article::find()->published()->andFilterWhere(['category_id' => $cid]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
        ]);

        return $dataProvider;
    }

    public function actionView($id = 0)
    {
        $model = Article::find()->published()->where(['id' => $id])->with('data')->one();
        if ($model === null) {
            throw new NotFoundHttpException('not found');
        }
        $model->addView();
        $model                    = $model->toArray([], ['data']);
        $model['data']['content'] = \yii\helpers\Markdown::process($model['data']['content'], 'gfm');
        $css                      = Url::to('/', true) . \Yii::getAlias('@web') . '/article.css';
        $html
                                  = <<<CONTENT
    <div class="view-title">
        <h1>{$model['title']}</h1>
    </div>
    <div class="action">
        <span class="views">{$model['view']}次浏览</span>
    </div>
    <div class="view-content">{$model['data']['content']}</div>
CONTENT;
        $model['css']             = $css;
        $model['html']            = $html;

        return $model;
    }
}