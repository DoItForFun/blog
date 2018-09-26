<?php
/**
 * User: lizhe
 * Date: 2018/9/26
 * Time: 10:05
 */
namespace common\controllers;
class Web extends \Yaf\Controller_Abstract{
    public function init()
    {
        \Yaf\Loader::import(APP_ROOT . '/application/library/common/Yurl.php');
    }
}