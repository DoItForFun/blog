<?php
/**
 * @name Bootstrap
 * @author lizhe
 * @desc 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * @see http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * 这些方法, 都接受一个参数:Yaf_Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
use Illuminate\Database\Capsule\Manager as DB;
class Bootstrap extends Yaf\Bootstrap_Abstract {
    private $config;
	public function _initConfig() {
		//把配置保存起来
		$arrConfig = Yaf\Application::app()->getConfig();
		Yaf\Registry::set('config', $arrConfig);
		$this->config = $arrConfig;
	}

	public function _initPlugin(Yaf\Dispatcher $dispatcher) {
		//注册一个插件
		$objSamplePlugin = new SamplePlugin();
		$dispatcher->registerPlugin($objSamplePlugin);
	}

	/**
	 * @param \Yaf\Dispatcher $dispatcher
	 */
	public function _initRoute(Yaf\Dispatcher $dispatcher) {
		//在这里注册自己的路由协议,默认使用简单路由
        $router = $dispatcher->getRouter();

        $route = new Yaf\Route\Rewrite(
            '/home',
            [
                'module' => 'Web',
                'controller'=>'Index',
                'actions' => 'index'
            ],[]);
       $routeAdmin = new Yaf\Route\Rewrite(
           '/back',
           [
               'module' => 'Admin',
               'controller'=>'Index',
               'action' => 'index'
           ],[]
       );
       $routeLogin = new Yaf\Route\Rewrite(
           '/login',
           [
               'module' => 'Admin',
               'controller'=>'Login',
               'action' => 'index'
           ],[]
       );
       $routeRegister = new Yaf\Route\Rewrite(
           '/register',
           [
               'module' => 'Admin',
               'controller' => 'Register',
               'action' => 'index'
           ],[]
       );

        $router->addRoute('home',$route);
        $router->addRoute('admin',$routeAdmin);
        $router->addRoute('login',$routeLogin);
        $router->addRoute('register',$routeRegister);


	}

	public function _initView(Yaf\Dispatcher $dispatcher) {
		//在这里注册自己的view控制器，例如smarty,firekylin

	}

    /**
     * 引入Eloquent
     */
    public function _initLoder()
    {
        $loder = \Yaf\Loader::getInstance();
        $autoload = APP_ROOT . '/vendor/autoload.php';
        if(file_exists($autoload)){
            $loder->import($autoload);
        }
	}

    public function _initNamespace()
    {
        $loader = \Yaf\Loader::getInstance();
        $loader->registerLocalNamespace(array("common", "Local"));
    }

    /**
     * 初始化Eloquent ORM
     * @param \Yaf\Dispatcher $dispatcher
     */
    public function _initDefaultDb(Yaf\Dispatcher $dispatcher)
    {
        $capsule = new DB();

        $database = $this->config->database->toArray();
        $capsule->addConnection($database);          // 创建连接
        $capsule->setAsGlobal();                     // 设定全局静态访问
        $capsule->bootEloquent();                    // 启动Eloquet
        if(ini_get('yaf.environ' != 'production')){
            $capsule->getConnection()->enableQueryLog();
        }
	}
}
