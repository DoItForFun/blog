<?php
/**
 * User: lizhe
 * Date: 2018/9/24
 * Time: 15:15
 */
namespace common\controllers;
use function MongoDB\BSON\toJSON;

class Admin extends \Yaf\Controller_Abstract{


    public function successfulJump($message = '',$url= '' ,$second = 5 )
    {
        $this->getView()->assign('message', $message);
        $this->getView()->assign('url', $url);
        $this->getView()->assign('second', $second);
        $script_path = $this->getViewPath();
        $this->_view->display($script_path . "/common/error.phtml");
        $this->end();
    }

    public function errorJump($message = '',$url= '' ,$second = 5)
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
    public function end() {
        \Yaf\Dispatcher::getInstance()->autoRender(false);
    }

    /**
     * @param int $status 登录状态 1 登录 0 登出
     * @param $userInfo
     */
    public function loginStatus($userInfo ,$status = 1)
    {
        if($status === 1){
            session_start();
            $_SESSION['userinfo'] = ($userInfo);
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
        $urlInfo = explode('?url=',$url);
        $url = urldecode(array_pop($urlInfo));
        $jump = $url;
        if($url == '/login' || $url == '/admin/login/index'){
            $jump = '/back';
        }
        return $jump;
    }
}