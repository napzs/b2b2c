<?php
/**
 *
 * hbshop
 *
 * @package   CategoryBehavior
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace common\models\behaviors;


use common\models\Article;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class CategoryBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_UPDATE => [$this, 'afterUpdateInternal'],
        ];
    }

    public function afterUpdateInternal($event)
    {
        // 如果修改了分类名,更新文章表分类名冗余字段
        $changedAttributes = $event->changedAttributes;
        if (isset($changedAttributes['title'])) {
            Article::updateAll(['category' => $event->sender->title], ['category_id' => $event->sender->id]);
        }
    }
}