<?php

/**
 *
 * hbshop
 *
 * @package   LocaleBehavior
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */
namespace common\behaviors;

use yii\base\Behavior;
use Yii;
use yii\web\Application;

/**
 * Class LocaleBehavior
 * @package   LocaleBehavior
 */
class LocaleBehavior extends Behavior
{
    /**
     * @var string
     */
    public $cookieName = '_locale';

    /**
     * @var bool
     */
    public $enablePreferredLanguage = true;
    /**
     * @return array
     */
    public function events()
    {
        return [
            Application::EVENT_BEFORE_REQUEST => 'beforeRequest'
        ];
    }

    /**
     * Resolve application language by checking user cookies, preferred language and profile settings
     */
    public function beforeRequest()
    {
        if (!Yii::$app instanceof Application) {
            return true;
        }
        $hasCookie = Yii::$app->getRequest()->getCookies()->has($this->cookieName);
        $forceUpdate = Yii::$app->session->hasFlash('forceUpdateLocale');
        if ($hasCookie && !$forceUpdate)
        {
            $locale = Yii::$app->getRequest()->getCookies()->getValue($this->cookieName);
        } else {
            $locale = $this->resolveLocale();
        }
        Yii::$app->language = $locale;
    }

    public function resolveLocale()
    {
        $locale = Yii::$app->language;

        if (!Yii::$app->user->isGuest && Yii::$app->user->identity->profile->locale) {
            $locale = Yii::$app->user->getIdentity()->profile->locale;
        } elseif ($this->enablePreferredLanguage) {
            $locale = Yii::$app->request->getPreferredLanguage($this->getAvailableLocales());
        }

        return $locale;
    }

    /**
     * @return array
     */
    protected function getAvailableLocales()
    {
        return array_keys(Yii::$app->params['availableLocales']);
    }
}
