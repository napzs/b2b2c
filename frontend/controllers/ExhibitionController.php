<?php
/**
 *
 * hbshop
 *
 * @package   ExhibitionController
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */
namespace frontend\controllers;

use frontend\models\Article;
use yii\data\ActiveDataProvider;

class ExhibitionController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = Article::find()->normal()->andWhere(['module' => 'exhibition'])->innerJoinWith('sameCityExhibition');
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

}
