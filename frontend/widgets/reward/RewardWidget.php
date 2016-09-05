<?php
/**
 *
 * hbshop
 *
 * @package   RewardWidget
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace frontend\widgets\reward;


use yii\base\Widget;
use Yii;

class RewardWidget extends Widget
{
    public $articleId;

    public function run()
    {
        $model = new RewardForm();
        $model->money = Yii::$app->user->isGuest ? 0 : Yii::$app->user->identity->profile->money;
        $model->article_id = $this->articleId;
        return $this->render('index', ['model' => $model]);
    }
}