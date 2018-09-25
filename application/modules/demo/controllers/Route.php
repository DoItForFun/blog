<?php
/**
 * User: lizhe
 * Date: 2018/9/22
 * Time: 15:04
 */
use Yaf\Controller_Abstract;
class RouteController extends Controller_Abstract{
    /**
     * domain.com/index.php?m='module'&c='controller'&a='actions'
     */
    public function simpleAction()
    {
        Yaf\Dispatcher::getInstance()->disableView();
        echo 'I am a simple';
    }

    /**
     * domain.com/index.php?r='module/route/actions'
     */
    public function superVarAction()
    {
        \Yaf\Dispatcher::getInstance()->disableView();
        echo 'I am a superVar';
    }
    /**
     * 
     */
    public function rewriteAction()
    {
        \Yaf\Dispatcher::getInstance()->disableView();
        echo 'I am a rewrite'.'<br />';
        echo $this->getRequest()->getParam('name');
    }

    public function regexAction()
    {
        \Yaf\Dispatcher::getInstance()->disableView();
        echo 'I am a regex'.'<br />';
        echo $this->getRequest()->getParam('id');
        echo $this->getRequest()->getParam('test');

    }
}