<?php
/**
 * User: lizhe
 * Date: 2018/9/23
 * Time: 09:06
 */
use Yaf\Controller_Abstract;
class requestController extends Controller_Abstract{

    /**
     * @获取服务器信息 等同于$_SERVER全局变量
     */
    public function serverAction()
    {
        $request = $this->getRequest();
        $server = $request->getServer();
        echo '<pre>';
        var_dump($server);

        return false;
    }
    /**
     * @获取参数信息
     */
    public function infoAction()
    {
        $request = $this->getRequest();
        /**
         * $request->getParam("name", "");//格式为/name/123
         */
        /**
         * $request->getQuery("name", "");//格式为?name=123
         */
        $response = $request->get('name');
        var_dump($response);
        Yaf\Dispatcher::getInstance()->disableView();
    }

    /**
     * 判断请求类型
     */
    public function methodAction()
    {
        $request = $this->getRequest();
        var_dump($request->isPost());
        var_dump($request->isGet());
        var_dump($request->isXmlHttpRequest());//判断是否为ajax请求
        var_dump($request->isHead());//判断是否为ajax请求

        Yaf\Dispatcher::getInstance()->disableView();
    }
}