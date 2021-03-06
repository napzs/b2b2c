<?php
/**
 *
 * hbshop
 *
 * @package   ArticleJob
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    alex<lxiangcn@gmail.com>
 */
namespace console\models;

class ArticleJob
{
    public function perform()
    {
        //获取队列内容属性
        $args          = $this->args;
        $category      = $args['category'];
        $url           = $args['url'];
        $cover         = $args['cover'];
        $baseClassName = $args['className'];
        $publishTime   = $args['publishTime'];
        $spider        = SpiderFactory::create($baseClassName);
        $res           = $spider->getContent(trim($url), $category);
        $res           = json_decode($res, true);
        if ($res) {
            $title   = $res['title'];
            $content = $res['content'];
            $time    = $res['time'];
            $time    = $publishTime ?: $time;
            //            if(!$spider->isGathered($url)){
            $result = $spider->insert($title, $content, $time, $category, $cover);
            $spider->addLog($url, $category, $result, $title);
            //            }
        }
    }
}
