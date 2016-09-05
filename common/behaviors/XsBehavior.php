<?php
/**
 *
 * hbshop
 *
 * @package   XsBehavior
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace common\behaviors;


use common\models\Article;
use common\models\Search;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class XsBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => [$this, 'afterSaveInternal'],
            ActiveRecord::EVENT_AFTER_UPDATE => [$this, 'afterSaveInternal']
        ];
    }

    public function afterSaveInternal($event)
    {
        $article = Article::findOne(['id' => $event->sender->id]);
        if (!empty($article)) {
            if ($event->name == 'afterInsert') {
                $search = new Search();
                $search->id = $event->sender->id;
            } else {
                $search = Search::findOne($event->sender->id);
            }
            $search->status = $article->status;
            $search->title = $article->title;
            $search->content = $event->sender->content;
            $search->published_at = $article->published_at;
            $search->save();
        }
    }
}