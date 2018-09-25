<?php
/**
 * User: lizhe
 * Date: 2018/9/23
 * Time: 21:13
 */
class RegisterController extends \common\controllers\Admin {
    public function indexAction()
    {
        if($this->getRequest()->isPost()){
            $userRegister = $this->_request->getPost();
            $code = $this->getRegisterCodeAction();
            if($userRegister['code'] != $code){
                $this->errorJump('注册码不正确','/register',5);
            }
            $userInfo = array('name'=>$userRegister['username'],'password'=>sha1($userRegister['password']));
            try{
                $uid = Admin_UserModel::insertData($userInfo);
            }catch (Exception $e){
                $this->errorJump($e->getMessage(),'/register',5);
            }
            //登录状态标识
            $this->loginStatus(array('id'=>$uid,'username'=>$userRegister['username']));
            $this->successfulJump('注册成功','/back',5);
        }
    }

    public function getRegisterCodeAction()
    {
        Yaf\Dispatcher::getInstance()->disableView();
        echo  md5(date('Y-m-d-h').'lizhe');

    }
    public function ajaxCheckAction()
    {
        Yaf\Dispatcher::getInstance()->disableView();
        if($this->_request->isXmlHttpRequest()){
           $info = $this->_request->getPost();
           $userName = $info['name'];
           $user =Admin_UserModel::where('name','=',$userName)->get()->toArray();
           if(!empty($user)){
               echo '用户名已存在';
           }
        }
    }
}