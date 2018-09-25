<?php
/**
 * User: lizhe
 * Date: 2018/9/23
 * Time: 19:58
 */

class IndexController extends \common\controllers\Admin {
    private $url;
    public function init()
    {
        $this->url = $this->urlEncryption();
    }
    public function indexAction()
    {
        //判断登录状态
        session_start();
        $user = $_SESSION['userinfo'];
        if(empty($user)){
            $this->redirect('/login?url='.$this->url);
        }


    }
}