<?php
/**
 * User: lizhe
 * Date: 2018/9/23
 * Time: 10:12
 */
use Yaf\Controller_ABstract;
class responseController extends Controller_Abstract{
    public function init()
    {
        Yaf\Dispatcher::getInstance()->disableView();
    }
    public function headerAction()
    {
        $response = $this->getResponse();

        $response->setAllHeaders(['X-version'=>'v2.1','id'=>1]);//设置header信息
        //getHeader()获取所有设置的header信息
        var_dump($response->getHeader());
    }

    public function bodyAction()
    {
        $response = $this->getResponse();
        $response->clearBody();
        $response->setBody('test content for myself','footer');//设置body信息
        $response->appendBody( ' after ','footer');//在body后方添加信息
        $response->prependBody('before ','footer');//在body开头添加信息
        var_dump($response->getBody(NUll));//getBody 传入NULL可以获取所有body信息
    }

    /**
     * 跳转
     */
    public function redirectAction()
    {
        $response = $this->getResponse();
        $response->setRedirect('http://www.baidu.com');//跳转
    }
    /**
     * resonse
     */
    public function responseAction()
    {
        $response = $this->getResponse();
        $response->setBody('test');//隐式调用了response
        $response->response();
    }
}