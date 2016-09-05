<?php
/**
 *
 * hbshop
 *
 * @package   ThemeManager
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */
namespace common\components;

class ThemeManager extends PackageManager
{

    public $paths = ['@frontend/themes'];

    public $namespace = 'frontend\\themes\\';

    public $infoClass = 'Theme';

    public function getThemePath()
    {
        return  $this->paths[0];
    }

    public function getDefaultTheme()
    {
        return \Yii::$app->config->get('THEME_NAME');
    }

    public function setDefaultTheme($id)
    {
       return \Yii::$app->config->set('THEME_NAME', $id);
    }
}