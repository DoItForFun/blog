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
        parent::init();
        ini_set('yaf.use_namespace', "1");
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
                if($_POST['remember'] == 'on'){
                    setcookie('username',$userName);
                    setcookie('password',$_POST['password']);
                }else{
                    setcookie('username','',-1);
                    setcookie('password','',-1);
                }
                $this->redirect($url);
            }
            $this->errorJump('用户名或密码错误','/login');
        }
    }


}