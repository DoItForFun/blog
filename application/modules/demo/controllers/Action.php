<?php
/**
 * User: lizhe
 * Date: 2018/9/23
 * Time: 12:56
 */
class ActionController extends \Yaf\Controller_Abstract{
    public $actions = array(
        'add' => 'actions/add.php',
        'detail' => 'actions/detail.php',
    );

    public function loginAction()
    {
        $this->redirect('/demo/action/add');
    }

    public function login2Action()
    {
        //Yaf\Dispatcher::getInstance()->disableView();
        $this->forward('add',array('id'=>2,'name'=>'jack'));
        echo 'before';
        return false;
    }

    /**
     * @return bool
     */
    public function mysqlAction()
    {
        $user = UserModel::where("id",'=' ,"2")->get();
        var_dump($user->toArray());die;
        return false;
    }

}