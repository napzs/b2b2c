<?php
/**
 *
 * hbshop
 *
 * @package   Tag
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */
namespace common\widgets\tag;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

class Tag extends InputWidget
{
    public $id = 'tags';

    public $clientOptions = [];

    public function init()
    {
        $this->options['id'] = $this->id;
    }
    public function run()
    {
        TagAsset::register($this->view);
        $options = array_merge([
            'height' => '100px',
            'width' => '300px',
            'interactive' => true,
            'defaultText' => '',
            'delimiter' => ' ',   // Or a string with a single delimiter. Ex: ';'
            'removeWithBackspace' => true,
            'minChars' => 0,
            'maxChars' => 0, // if not provided there is no limit
            'placeholderColor' => '#666666'
        ], $this->clientOptions);
        $clientOptions = Json::htmlEncode($options);
        $this->view->registerJs(<<<JS
$('#{$this->id}').tagsInput({$clientOptions});
JS
);
        if($this->hasModel()){
            return Html::activeTextInput($this->model,$this->attribute,$this->options);
        }else{
            return Html::textInput($this->name,$this->value,$this->options);
        }
    }
}