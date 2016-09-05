<?php
/**
 *
 * hbshop
 *
 * @package   SystemController
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */
namespace backend\controllers;

use Yii;
use common\models\Config;
use yii\base\Model;
use yii\caching\TagDependency;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class SystemController extends Controller {
    public function actionConfig($group = 'site') {
        $groups = Yii::$app->config->get('CONFIG_GROUP');
        $dataProvider = new ActiveDataProvider([
            'query'      => Config::find()->where(['group' => $group]),
            'pagination' => false
        ]);

        return $this->render('config', [
            'groups'       => $groups,
            'group'        => $group,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionStoreConfig($group = 'site') {
        $dataProvider = new ActiveDataProvider([
            'query'      => Config::find()->where(['group' => $group]),
            'pagination' => false
        ]);
        $configs = $dataProvider->getModels();
        if (Model::loadMultiple($configs, \Yii::$app->request->post()) && Model::validateMultiple($configs)) {
            foreach ($configs as $config) {
                /* @var $config Config */
                $config->save(false);
            }
            TagDependency::invalidate(\Yii::$app->cache, Yii::$app->config->cacheTag);

            return $this->redirect('config');
        }
    }
}
