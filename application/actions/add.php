<?php
/**
 * User: lizhe
 * Date: 2018/9/23
 * Time: 12:57
 */
class AddAction extends \Yaf\Action_Abstract {
    public function execute()
    {
        Yaf\Dispatcher::getInstance()->disableView();
        // TODO: Implement execute() method.
        $params = $this->getRequest()->getParams();

        var_dump($params);

    }
}