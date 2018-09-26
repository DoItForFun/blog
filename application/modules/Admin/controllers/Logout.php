<?php
/**
 * User: lizhe
 * Date: 2018/9/26
 * Time: 10:58
 */
class LogoutController extends \common\controllers\Admin{
    public function logoutAction()
    {
        $this->loginStatus('',0);
        return false;
    }
}