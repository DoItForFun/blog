<?php
/**
 * User: lizhe
 * Date: 2018/9/23
 * Time: 15:41
 */
use Yaf\Controller_Abstract;
class ViewController extends Controller_Abstract{
    public function testAction()
    {
        $this->getView()->assign('test','title');
        $this->getView()->setScriptPath(APP_ROOT . '/application/modules/demo/views/view/');
        $this->getView()->display('index.phtml');
        echo $this->getView()->getScriptPath();
        return false;
    }
}