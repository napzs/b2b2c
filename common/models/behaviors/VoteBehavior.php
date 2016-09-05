<?php
/**
 *
 * hbshop
 *
 * @package   VoteBehavior
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace common\models\behaviors;


use common\helpers\Html;
use common\models\Vote;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class VoteBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'sendNotify'
        ];
    }

    public function sendNotify($event)
    {
        // 赞才发通知
        if ($event->sender->action == Vote::ACTION_UP) {
            $fromUid = $event->sender->user_id;
            switch ($event->sender->type) {
                case 'article':
                    $category = 'up_article';
                    $article = $event->sender->article;
                    $toUid = $article->user_id;
                    $extra = [
                        'article_title' => Html::a($article->title, ['/article/view', 'id' => $article->id])
                    ];
                    break;
                default:
                    return;
                    break;
            }
            \Yii::$app->notify->category($category)
                ->from($fromUid)
                ->to($toUid)
                ->extra($extra)
                ->link(url(['/article/view', 'id' => $article->id]))
                ->send();
        }
    }
}