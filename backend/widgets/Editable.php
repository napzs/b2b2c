<?php
/**
 *
 * hbshop
 *
 * @package   Editable
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace backend\widgets;


class Editable extends \dosamigos\editable\Editable
{
    public function init()
    {
        parent::init();
        if ($this->type == 'boolean') {
            $this->type = 'select';
            $source = [
                [
                    'value' => 0,
                    'text' => '否'
                ],
                [
                    'value' => 1,
                    'text' => '是'
                ]
            ];
            $this->clientOptions['source'] = $source;
        }
    }
}