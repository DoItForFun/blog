<?php
/**
 * User: lizhe
 * Date: 2018/9/24
 * Time: 15:15
 */

namespace common\controllers;

class Admin extends \Yaf\Controller_Abstract
{
    public $uid;
    public function init()
    {
        \Yaf\Loader::import(APP_ROOT . '/application/library/common/Yurl.php');
    }

    public function successfulJump($message = '', $url = '', $second = 5)
    {
        $this->getView()->assign('message', $message);
        $this->getView()->assign('url', $url);
        $this->getView()->assign('second', $second);
        $script_path = $this->getViewPath();
        $this->_view->display($script_path . "/common/error.phtml");
        $this->end();
    }

    public function errorJump($message = '', $url = '', $second = 5)
    {
        $this->getView()->assign('message', $message);
        $this->getView()->assign('url', $url);
        $this->getView()->assign('second', $second);
        $script_path = $this->getViewPath();
        $this->_view->display($script_path . "/common/error.phtml");
        $this->end();
    }

    /**
     * 关闭模板渲染。
     */
    public function end()
    {
        \Yaf\Dispatcher::getInstance()->autoRender(false);
    }

    /**
     * @param int $status 登录状态 1 登录 0 登出
     * @param $userInfo
     */
    public function loginStatus($userInfo, $status = 1)
    {
        session_start();
        if ($status === 1) {
            $_SESSION['userinfo'] = ($userInfo);
        }
        if ($status === 0) {
            session_destroy();
            $this->redirect('/login');
        }
    }

    public function urlEncryption()
    {
        $requestUrl = $this->getRequest()->getServer('REQUEST_URI');
        return urlencode($requestUrl);
    }

    public function urlDecryption($url)
    {
        $url = urldecode($url);
        $urlInfo = explode('?url=', $url);
        $url = urldecode(array_pop($urlInfo));
        $jump = $url;
        if ($url == '/login' || $url == '/admin/login/index') {
            $jump = '/back';
        }
        return $jump;
    }

    public function infinitePoleClassification($arr, $pid = 0, $step = 0)
    {
        global $tree;
        foreach($arr as $val){
            if($val['pid'] == $pid){
                $str = str_repeat('一',$step);
                $val['level'] = $str;
                $tree[$val['id']] = $val;
                $this->infinitePoleClassification($arr,$val['id'],$step+1);
            }
        }
        return $tree;
    }



}