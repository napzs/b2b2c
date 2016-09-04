<?php
/**
 *
 * hbshop
 *
 * @package   console
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    alex<lxiangcn@gmail.com>
 */

/**
 * 任务调度
 * crontab -e * * * * * php /path/to/yii schedule/run  1>> /dev/null 2>&1
 *
 * @see
 */

// $schedule->command('migrate')->cron('* * * * *');

// $schedule->exec('composer self-update')->daily();