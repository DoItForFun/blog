<?php
/**
 * User: lizhe
 * Date: 2018/9/23
 * Time: 20:37
 */
class LoginController extends \common\controllers\Admin {
    private $url;
    public function init()
    {
        $this->url = $this->urlEncryption();
    }
    public function indexAction()
    {
        if($this->getRequest()->isPost()){
            //验证登录
            $userName = $_POST['username'];
            $password = sha1($_POST['password']);
            $check = Admin_UserModel::getOneData(array('name'=>$userName,'password'=>$password),['id']);
            if(isset($check['id'])){
                //登录完成，记录登录状态
                $this->loginStatus(array('id'=>$check['id'],'username'=>$userName));
                $url = $this->urlDecryption($this->url);
                $this->redirect($url);
            }
        }
    }


}