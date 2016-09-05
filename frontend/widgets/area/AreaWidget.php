<?php
/**
 *
 * hbshop
 *
 * @package   AreaWidget
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */
namespace frontend\widgets\area;

use common\models\Area;
use yii\base\Widget;
use yii\base\InvalidConfigException;
use yii\helpers\Html;


class AreaWidget extends Widget
{

    public $slug;

    public $headerClass ="";

    public $bodyClass ="";

    public $blockClass = "";

    public function init()
    {
        parent::init();
        if (empty($this->slug)) {
            throw new InvalidConfigException("slug不能为空");
        }
        $this->blockClass = $this->blockClass ." block";
        $this->headerClass = $this->headerClass . " block-header";
        $this->bodyClass = $this->bodyClass ." block-body";
    }

    public function run()
    {
        $model = Area::findByIdOrSlug($this->slug);

        $blocks = $model->getBlocks();
        $result = "";
        foreach ($blocks as $block) {
            $widget = $block["widget"];

            $header = Html::tag("h3", $block->title);

            $content = Html::tag("div", $header, [
                "class" => $this->headerClass
            ]);

            $body = $widget::widget([
                "model" => $block
            ]);

            $content .= Html::tag("div", $body, [
                "class" => $this->bodyClass
            ]);

            $result .= Html::tag("div", $content, [
                "class" => $this->blockClass
            ]);
        }

        return $result;
    }
}